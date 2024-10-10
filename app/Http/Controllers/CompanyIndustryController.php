<?php

namespace App\Http\Controllers;

use App\Models\CompanyIndustry;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CompanyIndustryController extends Controller
{
    public function index()
    {
        $industries = CompanyIndustry::get();

        return view('pages.company-industry', compact('industries'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:company_industries,name',
        ]);

        if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        try {
            CompanyIndustry::create([
                'id' => (string) Str::uuid(),
                'name' => $request->name,
            ]);

            return redirect()->route('master.industry.index')->with('success', 'Industri perusahan berhasil ditambahkan.');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan industri perusahan: ' . $e->getMessage());
        }

        return redirect()->route('master.industry.index')->with('error', 'Industri perusahan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:company_industries,name,'. $id,
        ]);

        try {
            $industry = CompanyIndustry::findOrFail($id);
            $industry->name = $request->name;

            $industry->save();

            return redirect()->route('master.industry.index')->with('success', 'Industri perusahan berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui industri perusahan: ' . $e->getMessage()]);
        }
    }

     public function destroy($id)
    {
        try {
            $industry = CompanyIndustry::findOrFail($id);

            $industry->delete();

            return redirect()->route('master.industry.index')->with('success', 'Industri perusahan berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('master.industry.index')->with('error', 'Gagal menghapus industri perusahan. ' . $e->getMessage());
        }
    }
}
