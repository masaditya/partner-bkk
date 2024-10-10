<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Major::get();

        return view('pages.major', compact('majors'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:majors,name',
        ]);

        if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        try {
            Major::create([
                'id' => (string) Str::uuid(),
                'name' => $request->name,
            ]);

            return redirect()->route('master.major.index')->with('success', 'Jurusan berhasil ditambahkan.');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan jurusan: ' . $e->getMessage());
        }

        return redirect()->route('master.major.index')->with('error', 'Jurusan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:majors,name,'. $id,
        ]);

        try {
            $major = Major::findOrFail($id);
            $major->name = $request->name;

            $major->save();

            return redirect()->route('master.major.index')->with('success', 'Jurusan berhasil diperbarui.');
        } catch (\Exception $e) {
            // Menangani kesalahan dan menampilkan pesan error
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui jurusan: ' . $e->getMessage()]);
        }
    }

     public function destroy($id)
    {
        try {
            $major = Major::findOrFail($id);
            $major->delete();

            return redirect()->route('master.major.index')->with('success', 'Jurusan berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('master.major.index')->with('error', 'Gagal menghapus jurusan. ' . $e->getMessage());
        }
    }
}
