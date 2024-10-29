<?php

namespace App\Http\Controllers;

use App\Events\NewOccupationEvent;
use App\Exports\OccupationExport;
use App\Models\CompanyIndustry;
use App\Models\Occupations;
use App\Models\User;
use App\Notifications\NewOccupationNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class OccupationsController extends Controller
{

    /**
     * Show the list of occupations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $occupations = Occupations::orderBy('deadline', 'desc')->get();
            return view('pages.occupation.index', compact('occupations'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Terjadi Kesalahan Saat Mengambil Data Lowongan Pekerjaan'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $industries = CompanyIndustry::all();
            return view('pages.occupation.create', compact('industries'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Terjadi Kesalahan Saat Mengarahkan Ke Halaman Create Lowongan Pekerjaan'
            ]);
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'deadline' => 'required|date',
            'location' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'company_industry_id' => 'required|exists:company_industries,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            if ($request->hasFile('thumbnail')) {
                $filename = time() . '.' . $request->thumbnail->extension();
                $path = $request->thumbnail->storeAs('thumbnails', $filename, 'public');
                $thumbnail_url = url('/storage/' . $path);
            }

            $occupation = Occupations::create([
                'id' => (string) Str::uuid(),
                'title' => $request->title,
                'description' => $request->description,
                'deadline' => $request->deadline,
                'location' => $request->location,
                'company' => $request->company,
                'thumbnail' => $thumbnail_url ?? 'https://placehold.co/160/blue/white?text=Company',
                'job_type' => $request->job_type,
                'company_industry_id' => $request->company_industry_id,
                'publisher_id' => Auth::id(),
            ]);

            $users = User::all();  // Anda bisa menyesuaikan query untuk mengambil user yang sesuai
            foreach ($users as $user) {
                $user->notify(new NewOccupationNotification($occupation));
            }

            broadcast(new NewOccupationEvent($occupation))->toOthers();

            return redirect()->route('occupation.index')->with('success', 'Lowongan pekerjaan berhasil dibuat');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membuat lowongan pekerjaan: ' . $e->getMessage());
        }
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Occupations  $occupation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
             $occupation = Occupations::findOrFail($id);
             $industries = CompanyIndustry::all();
             return view('pages.occupation.edit', compact('occupation', 'industries'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Terjadi Kesalahan Saat Mengarahkan Ke Halaman Edit Lowongan Pekerjaan: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Occupations  $occupation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'deadline' => 'required|date',
            'location' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'company_industry_id' => 'required|exists:company_industries,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            $occupation = Occupations::findOrFail($id);

            if ($request->hasFile('thumbnail')) {
                $filename = time() . '.' . $request->thumbnail->extension();
                $path = $request->thumbnail->storeAs('thumbnails', $filename, 'public');
                $thumbnail_url = url('/storage/' . $path);
                $occupation->thumbnail = $thumbnail_url;
            }

            $occupation->title = $request->title;
            $occupation->description = $request->description;
            $occupation->deadline = $request->deadline;
            $occupation->location = $request->location;
            $occupation->company = $request->company;
            $occupation->job_type = $request->job_type;
            $occupation->company_industry_id = $request->company_industry_id;
            $occupation->save();

            return redirect()->route('occupation.index')->with('success', 'Lowongan pekerjaan berhasil diupdate');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate lowongan pekerjaan: ' . $e->getMessage());
        }
    }

    /**
     * Hapus lowongan pekerjaan.
     *
     * @param int $id ID lowongan pekerjaan yang ingin dihapus
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $occupations = Occupations::findOrFail($id);

            $occupations->delete();

            return redirect()->route('occupation.index')->with('success', 'lowongan pekerjaan berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('occupation.index')->with('error', 'Gagal menghapus lowongan pekerjaan. ' . $e->getMessage());
        }
    }

        // Fungsi untuk export data Partner ke Excel
    public function exportExcel()
    {
        try {
            return Excel::download(new OccupationExport, 'Data_lowongan_pekerjaan_BKK_SIGMA.xlsx');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunduh data lowongan pekerjaan ke Excel: ' . $e->getMessage());
        }
    }

    // Fungsi untuk export data Partner ke PDF
    public function exportPDF()
    {
        try {
            $occupations = Occupations::all();
            $pdf = PDF::loadView('exports.occupation_pdf', compact('occupations'))
                ->setPaper('a4', 'potrait');
            return $pdf->download('Data_lowongan_pekerjaan_BKK_SIGMA.pdf');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunduh data lowongan pekerjaan ke PDF: ' . $e->getMessage());
        }
    }
}
