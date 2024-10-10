<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
        public function index()
    {
        $settings = Setting::get();

        return view('pages.setting', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:admins',
            'phone' => 'required|string|max:15',
            'facebook' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'youtube' => 'required|string|max:255',
            'tiktok' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        try {
            $setting = Setting::findOrFail($id);
            $setting->email = $request->email;
            $setting->phone = $request->phone;
            $setting->facebook = $request->facebook;
            $setting->instagram = $request->instagram;
            $setting->youtube = $request->youtube;
            $setting->tiktok = $request->tiktok;
            $setting->website = $request->website;
            $setting->address = $request->address;

            $setting->save();

            return redirect()->route('setting.index')->with('success', 'Pengaturan berhasil diperbarui.');
        } catch (\Exception $e) {
            // Menangani kesalahan dan menampilkan pesan error
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui pengaturan: ' . $e->getMessage()]);
        }
    }
}
