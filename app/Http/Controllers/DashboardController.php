<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Models\Donasi;
use App\Models\Zakat;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDonatur = Donatur::where('jenis', 'donatur')->count();
        $totalMuzakki = Donatur::where('jenis', 'muzakki')->count();
        $totalDonasi = Donasi::sum('jumlah');
        $totalZakat = Zakat::sum('jumlah');
        $totalTransaksi = Donasi::count() + Zakat::count();

        return view('dashboard', compact(
            'totalDonatur',
            'totalMuzakki',
            'totalDonasi',
            'totalZakat',
            'totalTransaksi'
        ));
    }
}
