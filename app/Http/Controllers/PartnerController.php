<?php

namespace App\Http\Controllers;

use App\Exports\PartnerExport;
use App\Models\Admin;
use App\Models\CompanyIndustry;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Admin::where('is_partner', '1')->get();
        $industries = CompanyIndustry::all();

        return view('pages.partner', compact('partners', 'industries'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:admins',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'company_name' => 'required|string|max:255',
            'company_industry_id' => 'required|exists:company_industries,id',
            'company_city' => 'required|string|max:255',
            'logo' => 'image|mimes:png,jpg,jpeg|max:1024',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $logoPath = null;
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
                $logoPath = url('storage/' . $logoPath);
            }

            Admin::create([
                'id' => (string) Str::uuid(),
                'name' => 'NULL',
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'is_partner' => 1,
                'company_name' => $request->company_name,
                'company_industry_id' => $request->company_industry_id,
                'company_city' => $request->company_city,
                'is_verified' => 1,
                'logo' => $logoPath,
            ]);

            return redirect()->route('partner.index')->with('success', 'Admin berhasil ditambahkan.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan admin: ' . $e->getMessage());
        }

        return redirect()->route('admins.index')->with('error', 'Terjadi kesalahan saat menambahkan admin');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'phone' => 'required|string|max:15',
            'company_name' => 'required|string|max:255',
            'company_industry_id' => 'required|exists:company_industries,id',
            'company_city' => 'required|string|max:255',
            'is_verified' => 'boolean',
            'is_show' => 'boolean',
            'logo' => 'image|mimes:png,jpg,jpeg|max:1024',
        ]);

        try {
            $admin = Admin::findOrFail($id);

            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->company_name = $request->company_name;
            $admin->company_industry_id = $request->company_industry_id;
            $admin->company_city = $request->company_city;
            $admin->is_verified = $request->boolean('is_verified');
            $admin->is_show = $request->boolean('is_show');

            if ($request->hasFile('logo')) {
                $filename = time() . '.' . $request->logo->extension();
                $path = $request->logo->storeAs('logos', $filename, 'public');
                $admin->logo = url('/storage/' . $path);
            }

            $admin->save();

            return redirect()->route('partner.index')->with('success', 'Admin berhasil diperbarui.');
        } catch (\Exception $e) {
            // Handle errors and display an error message
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui admin: ' . $e->getMessage()]);
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        try {
            $admin = Admin::findOrFail($id);
            $admin->password = bcrypt($request->password);

            $admin->save();

            return redirect()->route('partner.index')->with('success', 'Kata sandi berhasil diperbarui.');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui kata sandi: ' . $e->getMessage()]);
        }
    }

     public function destroy($id)
    {
        try {
            $admin = Admin::where('is_partner', '1')->findOrFail($id);

            // Hapus admin
            $admin->delete();

            return redirect()->route('partner.index')->with('success', 'Admin berhasil dihapus.');
        } catch (Exception $e) {
            // Tangani error jika admin tidak dapat dihapus atau tidak ditemukan
            return redirect()->route('partner.index')->with('error', 'Gagal menghapus partner. ' . $e->getMessage());
        }
    }

    // Fungsi untuk export data Partner ke Excel
    public function exportExcel()
    {
        try {
            return Excel::download(new PartnerExport, 'data_partner_industri_BKK_SIGMA.xlsx');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunduh data partner ke Excel: ' . $e->getMessage());
        }
    }

    // Fungsi untuk export data Partner ke PDF
    public function exportPDF()
    {
        try {
            $partners = Admin::where('is_partner', '1')->get();
            $pdf = PDF::loadView('exports.partner_pdf', compact('partners'))
                ->setPaper('a4', 'landscape');
            return $pdf->download('data_partner_industri_BKK_SIGMA.pdf');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunduh data partner ke PDF: ' . $e->getMessage());
        }
    }

    public function verify($id)
    {
        // Cari admin berdasarkan ID
        $admin = Admin::findOrFail($id);
        
        // Update is_verified menjadi 1
        $admin->is_verified = 1;
        $admin->save();

        // Redirect atau response sukses
        return redirect()->route('partner.index')->with('success', 'Akun Mitra industri berhasil diverifikasi.');
    }
}
