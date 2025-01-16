<?php

namespace App\Http\Controllers;

use App\Models\AnakMagang;
use App\Models\Berkas;
use App\Models\Institusi;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AnakMagangController extends Controller
{
    public function index()
    {
        $magangList = AnakMagang::with(['institusi', 'divisi', 'berkas'])->paginate(10);
        return view('magang.index', compact('magangList'));
    }

    public function create()
    {
        $institusi = Institusi::all();
        $divisi = Divisi::all();
        $berkas = Berkas::with('institusi')
            ->orderBy('created_at', 'desc')
            ->take(20) // Limit to 20 most recent berkas
            ->get();
        return view('magang.create', compact('institusi', 'divisi', 'berkas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_institusi' => 'required',
            'id_divisi' => 'required',
            'id_berkas' => 'required',
            'nomor_induk' => 'required|max:15',
            'nama_lengkap' => 'required|max:50',
            'jenis_kelamin' => 'required|in:l,p',
            'jurusan' => 'required|max:50',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'status' => 'required|in:mahasiswa,siswa'
        ]);

        AnakMagang::create($validated);
        return redirect()->route('magang.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $magang = AnakMagang::findOrFail($id);
        $institusi = Institusi::all();
        $divisi = Divisi::all();
        $berkas = Berkas::all();
        return view('magang.edit', compact('magang', 'institusi', 'divisi', 'berkas'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_institusi' => 'required',
            'id_divisi' => 'required',
            'id_berkas' => 'required',
            'nomor_induk' => 'required|max:15',
            'nama_lengkap' => 'required|max:50',
            'jenis_kelamin' => 'required|in:l,p',
            'jurusan' => 'required|max:50',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'status' => 'required|in:mahasiswa,siswa'
        ]);

        $magang = AnakMagang::findOrFail($id);
        $magang->update($validated);
        return redirect()->route('magang.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $magang = AnakMagang::findOrFail($id);
        $magang->delete();
        return redirect()->route('magang.index')->with('success', 'Data berhasil dihapus');
    }

    public function readOnly(Request $request)
    {
        $query = AnakMagang::query()->with(['institusi', 'divisi', 'berkas']);

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('nama_lengkap', 'like', "%{$searchTerm}%")
                    ->orWhere('nomor_induk', 'like', "%{$searchTerm}%")
                    ->orWhere('jurusan', 'like', "%{$searchTerm}%")
                    ->orWhereHas('institusi', function ($subQuery) use ($searchTerm) {
                        $subQuery->where('nama_institusi', 'like', "%{$searchTerm}%");
                    });
            });
        }

        // Status filter
        if ($request->filled('status') && $request->status !== 'all') {
            $now = Carbon::now();
            if ($request->status === 'active') {
                $query->where('tanggal_selesai', '>=', $now);
            } else {
                $query->where('tanggal_selesai', '<', $now);
            }
        }

        // Year filter
        if ($request->filled('year') && $request->year !== 'all') {
            $query->whereYear('tanggal_mulai', $request->year);
        }

        // Get unique years for the filter dropdown
        $uniqueYears = AnakMagang::selectRaw('YEAR(tanggal_mulai) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Get paginated results with query string parameters preserved
        $magangList = $query->orderBy('tanggal_mulai', 'desc')
            ->paginate(5)  // Increased from 2 to 10 for better usability
            ->withQueryString();

        return view('readonly', compact('magangList', 'uniqueYears'));
    }

    public function show($id)
    {
        $magang = AnakMagang::with(['institusi', 'divisi', 'berkas'])
            ->findOrFail($id);

        return view('magang.show', compact('magang'));
    }
}
