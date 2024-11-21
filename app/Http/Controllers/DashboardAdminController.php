<?php

namespace App\Http\Controllers;

use App\Models\AnakMagang;
use App\Models\Institusi;
use App\Models\Divisi;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // Hitung total data
        $totalMagang = AnakMagang::count();
        $totalInstitusi = Institusi::count();
        $totalDivisi = Divisi::count();

        // Statistik magang per bulan
        $magangPerBulan = AnakMagang::selectRaw('MONTH(tanggal_mulai) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Status magang
        $statusMagang = AnakMagang::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->get();

        // Data untuk chart
        $chartData = [
            'labels' => $magangPerBulan->pluck('bulan')->map(function($bulan) {
                $namaBulan = [
                    1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 
                    5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Ags', 
                    9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
                ];
                return $namaBulan[$bulan];
            }),
            'data' => $magangPerBulan->pluck('total')
        ];

        return view('dashboard', compact(
            'totalMagang', 
            'totalInstitusi', 
            'totalDivisi', 
            'chartData', 
            'statusMagang'
        ));
    }
}
