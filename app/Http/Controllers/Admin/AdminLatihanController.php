<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Latihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLatihanController extends Controller
{
    public function index()
    {
        $latihan = Latihan::latest()->get();
        return view('admin.latihan.index', compact('latihan'));
    }

    public function create()
    {
        return view('admin.latihan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'gif' => 'nullable|mimes:gif|max:4096',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'steps' => 'required',
        ]);

        // Simpan GIF ke storage/app/public/gif
        $gif = null;
        if ($request->hasFile('gif')) {
            $gif = $request->file('gif')->store('gif', 'public');
        }

        // Simpan gambar ke storage/app/public/latihan
        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('latihan', 'public');
        }

        Latihan::create([
            'name' => $request->name,
            'category' => $request->category,
            'gif' => $gif,
            'description' => $request->description,
            'steps' => explode("\n", $request->steps),
            'image' => $image
        ]);

        return redirect()->route('admin.latihan.index')->with('success', 'Latihan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $latihan = Latihan::findOrFail($id);
        return view('admin.latihan.edit', compact('latihan'));
    }

    public function update(Request $request, $id)
    {
        $latihan = Latihan::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'gif' => 'nullable|mimes:gif|max:4096',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // GIF lama
        $gif = $latihan->gif;

        // Upload GIF baru
        if ($request->hasFile('gif')) {

            // Hapus GIF lama
            if ($latihan->gif && Storage::disk('public')->exists($latihan->gif)) {
                Storage::disk('public')->delete($latihan->gif);
            }

            // Simpan GIF baru
            $gif = $request->file('gif')->store('gif', 'public');
        }

        // Gambar lama
        $image = $latihan->image;

        // Upload gambar baru
        if ($request->hasFile('image')) {

            if ($latihan->image && Storage::disk('public')->exists($latihan->image)) {
                Storage::disk('public')->delete($latihan->image);
            }

            $image = $request->file('image')->store('latihan', 'public');
        }

        // Update data
        $latihan->update([
            'name' => $request->name,
            'category' => $request->category,
            'gif' => $gif,
            'description' => $request->description,
            'steps' => explode("\n", $request->steps),
            'image' => $image
        ]);

        return redirect()->route('admin.latihan.index')
            ->with('success', 'Latihan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $latihan = Latihan::findOrFail($id);

        // Hapus GIF
        if ($latihan->gif && Storage::disk('public')->exists($latihan->gif)) {
            Storage::disk('public')->delete($latihan->gif);
        }

        // Hapus Gambar
        if ($latihan->image && Storage::disk('public')->exists($latihan->image)) {
            Storage::disk('public')->delete($latihan->image);
        }

        $latihan->delete();

        return redirect()->route('admin.latihan.index')
            ->with('success', 'Latihan berhasil dihapus');
    }
}
