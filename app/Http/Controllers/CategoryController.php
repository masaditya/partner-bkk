<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return view('pages.category', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        try {
            Category::create([
                'id' => (string) Str::uuid(),
                'name' => $request->name,
            ]);

            return redirect()->route('master.category.index')->with('success', 'Kategori berhasil ditambahkan.');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan kategori: ' . $e->getMessage());
        }

        return redirect()->route('master.category.index')->with('error', 'Kategori berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'. $id,
        ]);

        try {
            $category = Category::findOrFail($id);
            $category->name = $request->name;

            $category->save();

            return redirect()->route('master.category.index')->with('success', 'Kategori berhasil diperbarui.');
        } catch (\Exception $e) {
            // Menangani kesalahan dan menampilkan pesan error
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui kategori: ' . $e->getMessage()]);
        }
    }

     public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('master.category.index')->with('success', 'Kategori berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('master.category.index')->with('error', 'Gagal menghapus kategori. ' . $e->getMessage());
        }
    }
}
