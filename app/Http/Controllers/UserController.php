<?php

namespace App\Http\Controllers;

use App\Models\CompanyIndustry;
use App\Models\EmploymentStatuses;
use App\Models\Major;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{

    public function index()
    {
        $users = User::get();
        $majors = Major::all();
        return view('pages.user.index', compact('users', 'majors'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'is_alumni' => 'boolean',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        try {
            // Buat admin baru
            User::create([
                'id' => (string) Str::uuid(),
                'name' => $request->name,
                'email' => $request->email,
                'is_alumni' => $request->boolean('is_alumni'),
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('user.index')->with('success', 'Pelamar berhasil ditambahkan.');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan pelamar: ' . $e->getMessage());
        }

        return redirect()->route('user.index')->with('error', 'Pelamar berhasil ditambahkan!');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        try {
            $user = User::findOrFail($id);
            $user->password = bcrypt($request->password);

            $user->save();

            return redirect()->route('user.index')->with('success', 'Kata sandi berhasil diperbarui.');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui kata sandi: ' . $e->getMessage()]);
        }
    }

    /**
     * Menampilkan halaman edit untuk mengupdate data pelamar.
     *
     * @param int $id ID pelamar yang ingin diupdate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            $company_industries = CompanyIndustry::all();
            $majors = Major::all();
            $status = EmploymentStatuses::all();
            return view('pages.user.edit', compact('user', 'majors', 'company_industries','status'));
        } catch (\Exception $e) {
            return redirect()->route('user.index')->withErrors(['error' => 'Data admin tidak ditemukan: ' . $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'NIS' => 'nullable|string|max:20',
            'graduation_year' => 'nullable|integer',
            'major_id' => 'nullable|exists:majors,id',
            'status_id' => 'nullable|exists:employment_statuses,id',
            'company' => 'nullable|string|max:255',
            'company_industry_id' => 'nullable|exists:company_industries,id',
            'position' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'latest_degree' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'faculty' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'document' => 'nullable|file|mimes:pdf|max:1024',
            'gender' => 'nullable|string|max:10',
            'is_alumni' => 'nullable|boolean',
        ]);

        try {
            $user = User::findOrFail($id);
            $user->fill($request->only([
                'name',
                'email',
                'NIS',
                'graduation_year',
                'major_id',
                'status_id',
                'company',
                'company_industry_id',
                'position',
                'address',
                'phone',
                'latest_degree',
                'university',
                'faculty',
                'gender',
                'is_alumni',
            ]));

            if ($request->hasFile('photo')) {
                $filename = time() . '.' . $request->photo->extension();
                $path = $request->photo->storeAs('photos', $filename, 'public');
                $user->photo = url('/storage/' . $path);
            }

            if ($request->hasFile('document')) {
                $filename = time() . '.' . $request->document->extension();
                $path = $request->document->storeAs('CV', $filename, 'public');
                $user->document = url('/storage/' . $path);
            }

            $user->save();

            return redirect()->route('user.edit', $id)->with('success', 'Pelamar berhasil diperbarui.');
            
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    /**
     * Hapus pelamar.
     *
     * @param int $id ID pelamar yang ingin dihapus
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            $user->delete();

            return redirect()->route('user.index')->with('success', 'Pelamar berhasil dihapus.');
        } catch (Exception $e) {

            return redirect()->route('user.index')->with('error', 'Gagal menghapus pelamar. ' . $e->getMessage());
        }
    }
}
