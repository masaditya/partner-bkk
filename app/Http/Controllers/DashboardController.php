<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\EmploymentStatuses;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    
    public function index()
    {
        $stats = $this->cardStats();
        $alumniGrads = $this->getAlumniData();
        return view('pages.index', compact('stats', 'alumniGrads'));
    }

    // stats umum
    public function getUserGrowthData()
    {
        // Ambil 5 tahun terakhir
        $currentYear = Carbon::now()->year;
        $startYear = $currentYear - 4; // 5 tahun terakhir termasuk tahun ini

        $userGrowth = User::selectRaw('YEAR(created_at) as year, COUNT(*) as total')
            ->where('is_alumni', 0)
            ->whereYear('created_at', '>=', $startYear)
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();

        return response()->json($userGrowth);
    }

    public function getEducationData()
    {
        $educationData = User::selectRaw('latest_degree, COUNT(*) as total')
            ->where('is_alumni', 0)
            ->whereIn('latest_degree', ['SMK', 'SMA', 'D-1', 'D-2', 'D-3', 'D-4', 'S-1', 'S-2', 'S-3'])
            ->groupBy('latest_degree')
            ->get();

        return response()->json($educationData);
    }

    public function getApplicantsData()
    {
        // Ambil tahun sekarang dan mulai 5 tahun yang lalu
        $currentYear = Carbon::now()->year;
        $startYear = $currentYear - 4; // 5 tahun terakhir

        $applicantsData = Applicant::selectRaw('YEAR(applicants.created_at) as year, COUNT(*) as total')
            ->join('users', 'applicants.id_user', '=', 'users.id')
            ->where('users.is_alumni', 0) 
            ->whereYear('applicants.created_at', '>=', $startYear)
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();

        return response()->json($applicantsData);
    }

    public function getGenderDistribution()
    {
        // Menghitung jumlah user berdasarkan gender
        $genderData = User::selectRaw('gender, COUNT(*) as total')
            ->where('is_alumni', 0) // Hanya pengguna umum
            ->groupBy('gender')
            ->get();

        return response()->json($genderData);
    }
    // end

    public function getPartnerIndustryData()
    {
        // Ambil data partner industri yang bergabung setiap tahun untuk 10 tahun terakhir
        $partnerIndustryData = DB::table('admins')
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('count(*) as total'))
            ->where('is_partner', 1)
            ->where('created_at', '>=', now()->subYears(10)) // Ambil data 10 tahun terakhir
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->orderBy('year', 'asc')
            ->get();

        // Jika tidak ada data, inisialisasi data default
        $years = [];
        $totals = [];
        
        for ($i = 0; $i < 10; $i++) {
            $year = now()->year - $i; // Tahun sekarang - i
            $years[] = $year;
            $total = $partnerIndustryData->firstWhere('year', $year);
            $totals[] = $total ? $total->total : 0; // Jika tidak ada, gunakan 0
        }

        // Return data sebagai JSON
        return response()->json(['years' => $years, 'totals' => $totals]);
    }

    public function getStatusData()
    {
        // Hitung total user alumni
        $totalUsers = DB::table('users')
            ->where('is_alumni', 1) // Jika hanya alumni yang ingin dihitung
            ->count();

        // Ambil data status pekerjaan dari tabel users dan employment_statuses
        $statusData = DB::table('users')
            ->join('employment_statuses', 'users.status_id', '=', 'employment_statuses.id')
            ->select('employment_statuses.name as status', DB::raw('count(*) as total'))
            ->where('is_alumni', 1) // Jika hanya alumni yang ingin dihitung
            ->groupBy('employment_statuses.name')
            ->get();

        // Hitung persentase untuk setiap status
        $statusData = $statusData->map(function ($item) use ($totalUsers) {
            $item->percentage = round(($item->total / $totalUsers) * 100, 2); // Hitung persentase dan bulatkan 2 desimal
            return $item;
        });

        return response()->json($statusData);
    }

    public function getIndustryData()
    {
        // Ambil data dari tabel user yang berstatus bekerja dan group by company_industries
        $industryData = DB::table('users')
            ->join('company_industries', 'users.company_industry_id', '=', 'company_industries.id')
            ->select('company_industries.name as industry', DB::raw('count(*) as total'))
            ->where('users.is_alumni', 1)
            ->groupBy('company_industries.name')
            ->get();

        // Return data ke view sebagai JSON
        return response()->json($industryData);
    }

    private function getAlumniData()
    {
        // Ambil status "Berwirausaha", "Bekerja", dan "Kuliah" dari tabel employment_statuses
        $employmentStatuses = EmploymentStatuses::whereIn('name', ['Berwirausaha', 'Bekerja', 'Kuliah'])->get();
        
        // Ambil id masing-masing status
        $wirausahaId = $employmentStatuses->where('name', 'Berwirausaha')->first()->id;
        $bekerjaId = $employmentStatuses->where('name', 'Bekerja')->first()->id;
        $kuliahId = $employmentStatuses->where('name', 'Kuliah')->first()->id;

        // Ambil data alumni berdasarkan graduation_year dan status
        $years = ['2019', '2020', '2021', '2022', '2023'];
        
        $data = [];
        foreach ($years as $year) {
            // Total lulusan tiap tahun
            $totalLulusan = User::where('is_alumni', 1)
                                ->where('graduation_year', $year)
                                ->count();
            
            // Lulusan yang bekerja tiap tahun
            $lulusanBekerja = User::where('is_alumni', 1)
                                  ->where('graduation_year', $year)
                                  ->where('status_id', $bekerjaId)
                                  ->count();
            
            // Lulusan yang berwirausaha tiap tahun
            $lulusanWirausaha = User::where('is_alumni', 1)
                                    ->where('graduation_year', $year)
                                    ->where('status_id', $wirausahaId)
                                    ->count();
            
            // Lulusan yang melanjutkan pendidikan tiap tahun
            $lulusanKuliah = User::where('is_alumni', 1)
                                 ->where('graduation_year', $year)
                                 ->where('status_id', $kuliahId)
                                 ->count();
            
            // Masukkan data ke array
            $data[$year] = [
                'totalLulusan' => $totalLulusan,
                'lulusanBekerja' => $lulusanBekerja,
                'lulusanWirausaha' => $lulusanWirausaha,
                'lulusanKuliah' => $lulusanKuliah,
            ];
        }

        return $data; // Kembalikan data untuk digunakan di fungsi lain
    }

    private function cardStats()
    {
        $stats = [
            'users' => \App\Models\User::count(),
            'partners' => \App\Models\Admin::where('is_partner', 1)->count(),
            'occupations' => \App\Models\Occupations::count(),
            'applicants' => \App\Models\Applicant::count(),
        ];
        return $stats;
    }

}
