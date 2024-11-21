<?php

namespace App\Http\Controllers;

use App\Models\AnakMagang;
use App\Models\Institusi;
use App\Models\Divisi;
use Illuminate\Http\Request;

class AnakMagangController extends Controller
{
    public function index()
    {
        $magangList = AnakMagang::with(['institusi', 'divisi'])->paginate(10);
        return view('magang.index', compact('magangList'));
    }

    public function create()
    {
        $institusi = Institusi::all();
        $divisi = Divisi::all();
        return view('magang.create', compact('institusi', 'divisi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['id_institusi' => 'required',
        'id_divisi' => 'required',
        'nomor_induk' => 'required|max:15',
        'nama_lengkap' => 'required|max:50',
        'jenis_kelamin' => 'required|in:l,p',
        'jurusan' => 'required|max:50',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after:tanggal_mulai',
        'status' => 'required|in:mahasiswa,siswa']);

        AnakMagang::create($validated);
        return redirect()->route('magang.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $magang = AnakMagang::findOrFail($id);
        $institusi = Institusi::all();
        $divisi = Divisi::all();
        return view('magang.edit', compact('magang', 'institusi', 'divisi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(['id_institusi' => 'required', 'id_divisi' => 'required', 'nomor_induk' => 'required|max:15', 'nama_lengkap' => 'required|max:50', 'jenis_kelamin' => 'required|in:l,p', 'jurusan' => 'required|max:50', 'tanggal_mulai' => 'required|date', 'tanggal_selesai' => 'required|date|after:tanggal_mulai', 'status' => 'required|in:mahasiswa,siswa']);

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
        $query = AnakMagang::query();

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_lengkap', 'like', '%' . $request->search . '%')
                    ->orWhereHas('institusi', function ($subQuery) use ($request) {
                        $subQuery->where('nama', 'like', '%' . $request->search . '%');
                    });
            });
        }

        // Gunakan paginate untuk hasil paginasi
        $magangList = $query->with('institusi')->paginate(10);

        return view('readonly', compact('magangList'));
    }
}
