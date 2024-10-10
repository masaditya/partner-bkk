<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\CompanyIndustry;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'company_name' => 'required|string|max:255',
            'company_industry_id' => 'required|exists:company_industries,id',
            'company_city' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Admin::create([
                'id' => (string) Str::uuid(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'is_partner' => 1,
                'company_name' => $request->company_name,
                'company_industry_id' => $request->company_industry_id,
                'company_city' => $request->company_city,
                'is_verified' => 1,
            ]);

            return redirect()->route('partner.index')->with('success', 'Admin berhasil ditambahkan.');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan admin: ' . $e->getMessage());
        }

        return redirect()->route('admins.index')->with('error', 'Admin berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'phone' => 'required|string|max:15',
            'company_name' => 'required|string|max:255',
            'company_industry_id' => 'required|exists:company_industries,id',
            'company_city' => 'required|string|max:255',
        ]);

        try {
            $admin = Admin::findOrFail($id);
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->company_name = $request->company_name;
            $admin->company_industry_id = $request->company_industry_id;
            $admin->company_city = $request->company_city;

            $admin->save();

            return redirect()->route('partner.index')->with('success', 'Admin berhasil diperbarui.');
        } catch (\Exception $e) {
            // Menangani kesalahan dan menampilkan pesan error
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
}
