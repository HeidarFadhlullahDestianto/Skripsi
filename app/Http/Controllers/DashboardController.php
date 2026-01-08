<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Latihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    // ============================
    // DASHBOARD
    // ============================
    public function dashboardAdmin()
    {
        $sliders = Slider::latest()->get();
        return view('admin.dashboard', compact('sliders'));
    }

    public function dashboardUser()
    {
        $sliders = Slider::latest()->get();
        return view('user.dashboard', compact('sliders'));
    }

    // ============================
    // CRUD LATIHAN ADMIN
    // ============================
    public function indexLatihan()
    {
        $latihans = Latihan::latest()->get();
        return view('admin.latihan.index', compact('latihans'));
    }

    public function createLatihan()
    {
        return view('admin.latihan.create');
    }

    public function storeLatihan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'video' => 'required',
            'steps' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $image = $request->file('image')
            ? $request->file('image')->store('latihan')
            : null;

        Latihan::create([
            'name' => $request->name,
            'category' => $request->category,
            'video' => $request->video,
            'description' => $request->description,
            'steps' => explode("\n", $request->steps),
            'image' => $image,
        ]);

        return redirect()->route('admin.latihan.index')
            ->with('success', 'Latihan berhasil ditambahkan.');
    }

    public function editLatihan($id)
    {
        $latihan = Latihan::findOrFail($id);
        return view('admin.latihan.edit', compact('latihan'));
    }

    public function updateLatihan(Request $request, $id)
    {
        $latihan = Latihan::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'video' => 'required',
            'steps' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $image = $latihan->image;

        if ($request->hasFile('image')) {
            Storage::delete($latihan->image);
            $image = $request->file('image')->store('latihan');
        }

        $latihan->update([
            'name' => $request->name,
            'category' => $request->category,
            'video' => $request->video,
            'description' => $request->description,
            'steps' => explode("\n", $request->steps),
            'image' => $image,
        ]);

        return redirect()->route('admin.latihan.index')
            ->with('success', 'Latihan berhasil diperbarui.');
    }

    public function deleteLatihan($id)
    {
        $latihan = Latihan::findOrFail($id);

        Storage::delete($latihan->image);
        $latihan->delete();

        return redirect()->route('admin.latihan.index')
            ->with('success', 'Latihan berhasil dihapus.');
    }
}
