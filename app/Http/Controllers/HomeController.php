<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnakMagang; // Pastikan model Magang sudah ada

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data dari database
        $jumlahPesertaMagang = AnakMagang::count(); // Hitung total peserta magang

        // Kirim data ke view
        return view('home', [
            'jumlahPesertaMagang' => $jumlahPesertaMagang,
        ]);
    }

}
