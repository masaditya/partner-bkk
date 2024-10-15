<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Show the list of articles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $articles = Article::get();
            return view('pages.article.index', compact('articles'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Terjadi Kesalahan Saat Mengambil Data Artikel'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $categories = Category::get();
            return view('pages.article.create', compact('categories'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Terjadi Kesalahan Saat Mengarahkan Ke Halaman Create Artikel'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:articles,title',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            if ($request->hasFile('thumbnail')) {
                $filename = time() . '.' . $request->thumbnail->extension();
                $path = $request->thumbnail->storeAs('articles', $filename, 'public');
                $thumbnail_url = url('/storage/' . $path);
            }

            $article = Article::create([
                'id' => (string) Str::uuid(),
                'author_id' => Auth::user()->id,
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'thumbnail' => $thumbnail_url ?? null
            ]);

            return redirect()->route('article.index')->with('success', 'Artikel berhasil dibuat');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membuat artikel: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $categories = Category::get();
            $article = Article::findOrFail($id);
            return view('pages.article.edit', compact('article', 'categories'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Terjadi Kesalahan Saat Mengarahkan Ke Halaman Edit Artikel: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:articles,title,' . $id,
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            $article = Article::findOrFail($id);

            if ($request->hasFile('thumbnail')) {
                $filename = time() . '.' . $request->thumbnail->extension();
                $path = $request->thumbnail->storeAs('thumbnails', $filename, 'public');
                $thumbnail_url = url('/storage/' . $path);
                $article->thumbnail = $thumbnail_url;
            }

            $article->title = $request->title;
            $article->content = $request->content;
            $article->category_id = $request->category_id;
            $article->save();

            return redirect()->route('article.index')->with('success', 'Artikel berhasil diupdate');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate artikel: ' . $e->getMessage());
        }
    }

    /**
     * Hapus artikel.
     *
     * @param int $id ID artikel yang ingin dihapus
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $article = Article::findOrFail($id);

            $article->delete();

            return redirect()->route('article.index')->with('success', 'Artikel berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('article.index')->with('error', 'Gagal menghapus artikel. ' . $e->getMessage());
        }
    }
}

