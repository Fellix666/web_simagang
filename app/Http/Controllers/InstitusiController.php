<?php

namespace App\Http\Controllers;

use App\Models\Institusi;
use Illuminate\Http\Request;

class InstitusiController extends Controller
{
    public function index()
    {
        $institusi = Institusi::paginate(10);
        return view('institusi.index', compact('institusi'));
    }

    public function create()
    {
        return view('institusi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_institusi' => 'required|max:50',
            'alamat' => 'required|max:100',
            'website' => 'nullable|max:100|url',
            'email' => 'required|email|max:100'
        ]);

        Institusi::create($validated);
        return redirect()->route('institusi.index')->with('success', 'Instansi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $institusi = Institusi::findOrFail($id);
        return view('institusi.edit', compact('institusi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_institusi' => 'required|max:50',
            'alamat' => 'required|max:100',
            'website' => 'nullable|max:100|url',
            'email' => 'required|email|max:100'
        ]);

        $institusi = Institusi::findOrFail($id);
        $institusi->update($validated);
        return redirect()->route('institusi.index')->with('success', 'Instansi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $institusi = Institusi::findOrFail($id);
        $institusi->delete();
        return redirect()->route('institusi.index')->with('success', 'Instansi berhasil dihapus');
    }
}
