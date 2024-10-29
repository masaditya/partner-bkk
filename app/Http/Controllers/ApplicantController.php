<?php

namespace App\Http\Controllers;

use App\Exports\ApplicantExport;
use App\Models\Applicant;
use App\Models\Occupations;
use Illuminate\Http\Request;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ApplicantController extends Controller
{
    /**
     * Halaman daftar lowongan pekerjaan.
     *
     * Menampilkan halaman yang berisi daftar lowongan pekerjaan beserta tombol
     * untuk mengedit dan menghapus data lowongan pekerjaan. Jika terjadi
     * kesalahan saat mengambil data lowongan pekerjaan, maka akan diarahkan ke
     * halaman sebelumnya dengan pesan kesalahan.
     */
    public function index()
    {
        try {
            $occupations = Occupations::withCount('applicants')->orderBy('deadline', 'desc')->get();
            return view('pages.applicant.index', compact('occupations'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Terjadi kesalahan saat mengambil data lowongan pekerjaan. Silakan coba lagi.'
            ]);
        }
    }

    /**
     * Halaman edit pelamar.
     *
     * Mengarahkan ke halaman edit pelamar berdasarkan ID yang diterima.
     * Jika terjadi kesalahan saat mengarahkan ke halaman edit, maka akan
     * redirect kembali ke halaman sebelumnya dengan pesan error.
     *
     * @param int $id ID pelamar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $applicants = Applicant::where('id_occupation', $id)->get();
            $apply = Occupations::where('id', $id)->firstOrFail();
            return view('pages.applicant.show', compact('applicants', 'apply'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Terjadi kesalahan saat mengarahkan ke halaman pelamar: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Halaman edit pelamar.
     *
     * Mengarahkan ke halaman edit pelamar berdasarkan ID yang diterima.
     * Jika terjadi kesalahan saat mengarahkan ke halaman edit, maka akan
     * redirect kembali ke halaman sebelumnya dengan pesan error.
     *
     * @param int $id ID pelamar
     * @return \Illuminate\Http\Response
     */
    public function detail($idJob, $idUser)
    {
        try {
            $applicant = Applicant::where('id_occupation', $idJob)->where('id_user', $idUser)->firstOrFail();
            $occupation = Occupations::where('id', $idJob)->firstOrFail();
            return view('pages.applicant.detail', compact('applicant', 'occupation'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Terjadi kesalahan saat mengarahkan ke halaman detail pelamar. Silakan coba lagi.'
            ]);
        }
    }

    public function exportExcel($id)
    {
        try {
            // Teruskan $id ke dalam ApplicantExport
            return Excel::download(new ApplicantExport($id), 'data_pelamar_BKK_SIGMA.xlsx');
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Terjadi kesalahan saat meng-export data pelamar ke Excel: ' . $e->getMessage()
            ]);
        }
    }

    // Fungsi untuk export data Partner ke PDF
    public function exportPDF($id)
    {
        try {
            // Mengambil data pelamar berdasarkan $id
            $applicants = Applicant::where('id_occupation', $id)->get();

            // Memuat view dengan data pelamar
            $pdf = PDF::loadView('exports.applicant_pdf', compact('applicants'))
                ->setPaper('a4', 'landscape');

            // Mengunduh file PDF dengan nama yang sesuai
            return $pdf->download('data_pelamar_BKK_SIGMA.pdf');
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Terjadi kesalahan saat meng-export data pelamar ke PDF. Silakan coba lagi.'  . $e->getMessage()
            ]);
        }
    }

}
