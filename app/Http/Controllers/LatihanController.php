<?php

namespace App\Http\Controllers;

use App\Models\Latihan;
use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index(Request $request)
    {
        $search   = $request->query('search');
        $category = $request->query('category');

        $latihan = Latihan::when($search, function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->when($category, function ($q) use ($category) {
                $q->where('category', $category);
            })
            ->orderBy('name')
            ->get();

        // Ambil semua kategori unik
        $categories = Latihan::select('category')
            ->distinct()
            ->pluck('category');

        // Group data
        $kategori = $latihan->groupBy('category');

        return view('user.latihan.index', compact(
            'kategori',
            'categories',
            'search',
            'category'
        ));
    }

    public function show($id)
    {
        $latihan = Latihan::findOrFail($id);
        return view('user.latihan.show', compact('latihan'));
    }
}
