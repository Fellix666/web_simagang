<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $divisi = Divisi::paginate(10);
        return view('divisi.index', compact('divisi'));
    }

    public function create()
    {
        return view('divisi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_divisi' => 'required|max:50',
            'kepala_divisi' => 'required|max:50'
        ]);

        Divisi::create($validated);
        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $divisi = Divisi::findOrFail($id);
        return view('divisi.edit', compact('divisi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_divisi' => 'required|max:50',
            'kepala_divisi' => 'required|max:50'
        ]);

        $divisi = Divisi::findOrFail($id);
        $divisi->update($validated);
        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $divisi = Divisi::findOrFail($id);
        $divisi->delete();
        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil dihapus');
    }
}