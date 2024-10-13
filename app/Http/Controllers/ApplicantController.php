<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Exception;

class ApplicantController extends Controller
{
    /**
     * Halaman daftar pelamar.
     *
     * Menampilkan halaman yang berisi daftar pelamar beserta tombol untuk
     * mengedit dan menghapus data pelamar. Jika terjadi kesalahan saat
     * mengambil data pelamar, maka akan diarahkan ke halaman sebelumnya
     * dengan pesan kesalahan.
     */
    public function index()
    {
        try {
            $applicants = Applicant::get();
            return view('pages.applicant.index', compact('applicants'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Terjadi kesalahan saat mengambil data pelamar. Silakan coba lagi.'
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
    public function detail($id)
    {
        try {
            $applicant = Applicant::findOrFail($id);
            return view('pages.applicant.detail', compact('applicant'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Terjadi kesalahan saat mengarahkan ke halaman edit pelamar. Silakan coba lagi.'
            ]);
        }
    }
}
