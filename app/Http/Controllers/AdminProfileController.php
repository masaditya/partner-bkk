<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function update(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:admins,email,' . Auth::id(),
                'phone' => 'required|string|max:15',
            ]);

            $user = Admin::findOrFail(Auth::id());

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->save();

            return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui profil.');
        }
    }

    public function updatePassword(Request $request)
{
    try {
        // Validasi data
        $request->validate([
            'password' => 'required|string|min:8|confirmed', // Pastikan kata sandi memenuhi syarat
        ]);

        // Ambil user yang sedang login
        $user = Admin::findOrFail(Auth::id());

        // Update password pengguna
        $user->password = bcrypt($request->input('password'));
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Kata sandi berhasil diperbarui.');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Jika user tidak ditemukan
        return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Jika terjadi kesalahan validasi
        return redirect()->back()->withErrors($e->errors());
    } catch (\Exception $e) {
        // Jika terjadi kesalahan umum lainnya
        return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui kata sandi.');
    }
}


}
