<?php

namespace App\Http\Controllers;

use App\Models\AnakMagang;
use App\Models\Institusi;
use App\Models\Divisi;
use Carbon\Carbon;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // Hitung total data
        $totalMagang = AnakMagang::count();
        $totalInstitusi = Institusi::count();
        $totalDivisi = Divisi::count();

        // Statistik magang per bulan untuk tahun saat ini
        $currentYear = date('Y');
        $magangPerBulan = collect(range(1, 12))->map(function($bulan) use ($currentYear) {
            $count = AnakMagang::whereYear('tanggal_mulai', $currentYear)
                ->whereMonth('tanggal_mulai', $bulan)
                ->count();
            return [
                'bulan' => $bulan,
                'total' => $count
            ];
        });

        // Statistik magang per tahun
        $magangPerTahun = AnakMagang::selectRaw('YEAR(tanggal_mulai) as tahun, COUNT(*) as total')
            ->groupBy('tahun')
            ->orderBy('tahun')
            ->get();

        // Status magang
        $statusMagang = AnakMagang::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->get();

        // Data untuk chart bulanan
        $chartDataMonthly = [
            'labels' => $magangPerBulan->map(function($item) {
                $namaBulan = [
                    1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 
                    5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Ags', 
                    9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
                ];
                return $namaBulan[$item['bulan']];
            }),
            'data' => $magangPerBulan->pluck('total')
        ];

        // Data untuk chart tahunan
        $chartDataYearly = [
            'labels' => $magangPerTahun->pluck('tahun'),
            'data' => $magangPerTahun->pluck('total')
        ];

        return view('dashboard.index', compact(
            'totalMagang', 
            'totalInstitusi', 
            'totalDivisi', 
            'chartDataMonthly',
            'chartDataYearly', 
            'statusMagang'
        ));
    }
}