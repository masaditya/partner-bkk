<?php

namespace App\Http\Controllers;

use App\Models\EmploymentStatuses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class EmploymentStatusesController extends Controller
{
    public function index()
    {
        $statuses = EmploymentStatuses::get();

        return view('pages.status', compact('statuses'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:employment_statuses,name',
        ]);

        if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        try {
            EmploymentStatuses::create([
                'id' => (string) Str::uuid(),
                'name' => $request->name,
            ]);

            return redirect()->route('master.status.index')->with('success', 'Status pekerjaan berhasil ditambahkan.');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan status pekerjaan: ' . $e->getMessage());
        }

        return redirect()->route('master.status.index')->with('error', 'Status pekerjaan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:employment_statuses,name,'. $id,
        ]);

        try {
            $status = EmploymentStatuses::findOrFail($id);
            $status->name = $request->name;

            $status->save();

            return redirect()->route('master.status.index')->with('success', 'Status pekerjaan berhasil diperbarui.');
        } catch (\Exception $e) {
            // Menangani kesalahan dan menampilkan pesan error
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui status pekerjaan: ' . $e->getMessage()]);
        }
    }

     public function destroy($id)
    {
        try {
            $status = EmploymentStatuses::findOrFail($id);
            $status->delete();

            return redirect()->route('master.status.index')->with('success', 'Status pekerjaan berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('master.status.index')->with('error', 'Gagal menghapus status pekerjaan. ' . $e->getMessage());
        }
    }
}
