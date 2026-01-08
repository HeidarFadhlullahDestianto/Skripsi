<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    // ================================
    // ADMIN AREA
    // ================================

    // Halaman daftar berita (ADMIN)
    public function adminIndex()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    // Form tambah berita
    public function create()
    {
        return view('admin.news.create');
    }

    // Simpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
            'image'   => 'nullable|image'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('news'), $imageName);
        }

        News::create([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'content' => $request->content,
            'image'   => $imageName
        ]);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    // ================================
    // EDIT & UPDATE BERITA
    // ================================

    // Form edit berita
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    // Update berita
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
            'image'   => 'nullable|image'
        ]);

        // Jika upload gambar baru
        if ($request->hasFile('image')) {

            // Hapus gambar lama
            if ($news->image && file_exists(public_path('news/' . $news->image))) {
                unlink(public_path('news/' . $news->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('news'), $imageName);
            $news->image = $imageName;
        }

        $news->update([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'content' => $request->content,
            'image'   => $news->image
        ]);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    // ================================
    // HAPUS BERITA
    // ================================
    public function destroy(News $news)
    {
        if ($news->image && file_exists(public_path('news/' . $news->image))) {
            unlink(public_path('news/' . $news->image));
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus');
    }

    // ================================
    // USER AREA
    // ================================

    // Daftar berita (USER)
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('news.index', compact('news'));
    }

    // Detail berita (USER)
    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return view('news.show', compact('news'));
    }
}
