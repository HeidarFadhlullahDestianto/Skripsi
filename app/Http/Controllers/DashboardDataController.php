<?php
// app/Http/Controllers/DashboardDataController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
use App\Models\Slider;

class DashboardDataController extends Controller
{
    

    public function dashboardAdmin()
    {
        $sliders = Slider::latest()->get(); // ambil data slider dari database
        return view('admin.dashboard', array_merge(
        $this->getDashboardData(),
        compact('sliders')
    ));
    }

    public function dashboardUser()
    {
        $sliders = Slider::latest()->get();
        return view('user.dashboard', array_merge(
        $this->getDashboarduser(),
        compact('sliders')
    ));
    }

    

// public function getDashboarduser()
// {
//     $userId = Auth::id(); // atau Auth::user()->id atau Auth::user()->nik jika perlu disesuaikan

//     $mobil = Peminjaman::with('asset')
//         ->where('id_user', $userId) // ganti sesuai nama kolom di tabel peminjaman
//         ->whereHas('asset', function ($q) {
//             $q->where('jenis_asset', 'mobil');
//         })
//         ->latest()
//         ->get();

//     $ruangan = Peminjaman::with('asset')
//         ->where('id_user', $userId)
//         ->whereHas('asset', function ($q) {
//             $q->where('jenis_asset', 'ruangan');
//         })
//         ->latest()
//         ->get();

//     return compact('mobil','ruangan');
// }


//     public function dashboardAdmin()
// {
//     $mobil = Peminjaman::with('asset')
//         ->whereHas('asset', function ($query) {
//             $query->where('jenis_asset', 'mobil');
//         })
//         ->latest()
//         ->take(5)
//         ->get();

//     $ruangan = Peminjaman::with('asset')
//         ->whereHas('asset', function ($query) {
//             $query->where('jenis_asset', 'ruangan');
//         })
//         ->latest()
//         ->take(5)
//         ->get();

//     return view('admin.dashboard', compact('mobil', 'ruangan'));
// }
//     public function dashboardUser()
// {
//     $mobil = Peminjaman::with('asset')
//         ->whereHas('asset', function ($query) {
//             $query->where('jenis_asset', 'mobil');
//         })
//         ->latest()
//         ->take(5)
//         ->get();

//     $ruangan = Peminjaman::with('asset')
//         ->whereHas('asset', function ($query) {
//             $query->where('jenis_asset', 'ruangan');
//         })
//         ->latest()
//         ->take(5)
//         ->get();

//     return view('user.dashboard', compact('mobil', 'ruangan'));
// }

//     public function dashboardGA()
// {
//     $mobil = Peminjaman::with('asset')
//         ->whereHas('asset', function ($query) {
//             $query->where('jenis_asset', 'mobil');
//         })
//         ->latest()
//         ->take(5)
//         ->get();

//     $ruangan = Peminjaman::with('asset')
//         ->whereHas('asset', function ($query) {
//             $query->where('jenis_asset', 'ruangan');
//         })
//         ->latest()
//         ->take(5)
//         ->get();

//     return view('PJ.dashboardGA', compact('mobil', 'ruangan'));
// }
//     public function dashboardHR()
// {
//     $mobil = Peminjaman::with('asset')
//         ->whereHas('asset', function ($query) {
//             $query->where('jenis_asset', 'mobil');
//         })
//         ->latest()
//         ->take(5)
//         ->get();

//     $ruangan = Peminjaman::with('asset')
//         ->whereHas('asset', function ($query) {
//             $query->where('jenis_asset', 'ruangan');
//         })
//         ->latest()
//         ->take(5)
//         ->get();

//     return view('pj.dashboardHR', compact('mobil', 'ruangan'));
// }
//     public function dashboardSecurity()
// {
//     $mobil = Peminjaman::with('asset')
//         ->whereHas('asset', function ($query) {
//             $query->where('jenis_asset', 'mobil');
//         })
//         ->latest()
//         ->take(5)
//         ->get();

//     $ruangan = Peminjaman::with('asset')
//         ->whereHas('asset', function ($query) {
//             $query->where('jenis_asset', 'ruangan');
//         })
//         ->latest()
//         ->take(5)
//         ->get();

//     return view('pj.dashboardsecurity', compact('mobil', 'ruangan'));
// }
//     public function dashboardSekertaris()
// {
//     $mobil = Peminjaman::with('asset')
//         ->whereHas('asset', function ($query) {
//             $query->where('jenis_asset', 'mobil');
//         })
//         ->latest()
//         ->take(5)
//         ->get();

//     $ruangan = Peminjaman::with('asset')
//         ->whereHas('asset', function ($query) {
//             $query->where('jenis_asset', 'ruangan');
//         })
//         ->latest()
//         ->take(5)
//         ->get();

//     return view('pj.dashboardsekertaris', compact('mobil', 'ruangan'));
// }


}