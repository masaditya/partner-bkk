<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimoniController extends Controller
{
    /**
     * Show the list of testmoni
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonis = Testimoni::get();
        $users = \App\Models\User::get();
        return view('pages.testimoni', compact('testimonis', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'quote' => 'required|string',
            'company_logo' => 'nullable|image|mimes:png,jpg,jpeg|max:1024',
        ]);

        try {
            $company_logo = null;
            if ($request->hasFile('company_logo')) {
                $company_logo = $request->file('company_logo')->store('testimonis', 'public');
                $company_logo_url = url('storage/' . $company_logo);
            }

            Testimoni::create([
                'id' => (string) Str::uuid(),
                'user_id' => $request->user_id,
                'quote' => $request->quote,
                'company_logo' => $company_logo_url,
            ]);

            return redirect()->route('testimoni.index')->with('success', 'Testimoni created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan testimoni: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified testimoni in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'quote' => 'required|string',
            'company_logo' => 'nullable|image|mimes:png,jpg,jpeg|max:1024',
        ]);

        try {
            $testimoni = Testimoni::findOrFail($id);

            $testimoni->user_id = $request->user_id;
            $testimoni->quote = $request->quote;

            if ($request->hasFile('company_logo')) {
                $filename = time() . '.' . $request->company_logo->extension();
                $path = $request->company_logo->storeAs('company_logo', $filename, 'public');
                $testimoni->company_logo = url('/storage/' . $path);
            }

            $testimoni->save();

            return redirect()->route('testimoni.index')->with('success', 'Testimoni updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui testimoni: ' . $e->getMessage());
        }
    }
    
    /**
     * Remove the specified testimoni from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()->route('testimoni.index')->with('success', 'Testimoni dihapus berhasil.');
    }
}