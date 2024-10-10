<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::where('is_partner', '0')->get();

        return view('pages.admin', compact('admins'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        try {
            // Buat admin baru
            Admin::create([
                'id' => (string) Str::uuid(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan.');
            
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
        ]);

        try {
            $admin = Admin::findOrFail($id); // Mencari admin berdasarkan ID
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;

            $admin->save();

            return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui.');
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
            $admin = Admin::findOrFail($id); // Mencari admin berdasarkan ID
            $admin->password = bcrypt($request->password);

            $admin->save();

            return redirect()->route('admin.index')->with('success', 'Kata sandi berhasil diperbarui.');
        } catch (\Exception $e) {
            // Menangani kesalahan dan menampilkan pesan error
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui kata sandi: ' . $e->getMessage()]);
        }
    }

     public function destroy($id)
    {
        try {
            $admin = Admin::where('is_partner', '0')->findOrFail($id);

            // Hapus admin
            $admin->delete();

            return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus.');
        } catch (Exception $e) {
            // Tangani error jika admin tidak dapat dihapus atau tidak ditemukan
            return redirect()->route('admin.index')->with('error', 'Gagal menghapus admin. ' . $e->getMessage());
        }
    }

}
