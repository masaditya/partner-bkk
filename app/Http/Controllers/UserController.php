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

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'NIS' => 'nullable|string|max:20',
            'graduation_year' => 'nullable|integer',
            'major_id' => 'nullable|integer',
            'status_id' => 'nullable|integer',
            'company' => 'nullable|string|max:255',
            'company_industry_id' => 'nullable|integer',
            'position' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'latest_degree' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'faculty' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'document' => 'nullable|file|max:2048',
            'gender' => 'nullable|string|max:10',
            'is_alumni' => 'nullable|boolean',
        ]);

        try {
            $admin = User::findOrFail($id);

            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->NIS = $request->NIS;
            $admin->graduation_year = $request->graduation_year;
            $admin->major_id = $request->major_id;
            $admin->status_id = $request->status_id;
            $admin->company = $request->company;
            $admin->company_industry_id = $request->company_industry_id;
            $admin->position = $request->position;
            $admin->address = $request->address;
            $admin->phone = $request->phone;
            $admin->latest_degree = $request->latest_degree;
            $admin->university = $request->university;
            $admin->faculty = $request->faculty;
            $admin->gender = $request->gender;
            $admin->is_alumni = $request->is_alumni;

            // Handle file uploads if any
            if ($request->hasFile('photo')) {
                $admin->photo = $request->file('photo')->store('photos');
            }
            if ($request->hasFile('document')) {
                $admin->document = $request->file('document')->store('documents');
            }

            $admin->save();

            return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }


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
