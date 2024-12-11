<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\AnakMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerkasController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        // Retrieve all berkas
        $berkas = Berkas::paginate(10); // Paginate for better performance
        return view('berkas.index', compact('berkas'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('berkas.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_berkas' => 'required|max:50',
            'asal_berkas' => 'required|max:50',
            'nomor_berkas' => 'required|max:50',
            'tanggal_berkas' => 'required|date',
            'file' => 'required|file|mimes:pdf,jpg,png|max:2048'
        ]);

        try {
            // Store file
            $filePath = $request->file('file')->store('berkas', 'public');

            // Create berkas record
            Berkas::create([
                'nama_berkas' => $validated['nama_berkas'],
                'asal_berkas' => $validated['asal_berkas'],
                'nomor_berkas' => $validated['nomor_berkas'],
                'tanggal_berkas' => $validated['tanggal_berkas'],
                'file_path' => $filePath
            ]);

            return redirect()->route('berkas.index')
                ->with('success', 'Berkas berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengunggah berkas: ' . $e->getMessage());
        }
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $berkas = Berkas::findOrFail($id);
        return view('berkas.edit', compact('berkas'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $berkas = Berkas::findOrFail($id);

        $validated = $request->validate([
            'nama_berkas' => 'required|max:50',
            'asal_berkas' => 'required|max:50',
            'nomor_berkas' => 'required|max:50',
            'tanggal_berkas' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // Optional file upload
        ]);

        if ($request->hasFile('file')) {
            // Delete the old file from storage
            if (Storage::disk('public')->exists($berkas->file_path)) {
                Storage::disk('public')->delete($berkas->file_path);
            }

            // Store the new file
            $file = $request->file('file');
            $path = $file->store('berkas', 'public');
            $validated['file_path'] = $path;
        }

        // Update the berkas record
        $berkas->update($validated);

        return redirect()->route('berkas.index')->with('success', 'Berkas berhasil diperbarui');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $berkas = Berkas::findOrFail($id);

        // Delete the file from storage
        if (Storage::disk('public')->exists($berkas->file_path)) {
            Storage::disk('public')->delete($berkas->file_path);
        }

        // Delete the berkas record
        $berkas->delete();

        return redirect()->route('berkas.index')->with('success', 'Berkas berhasil dihapus');
    }

    // Display the specified resource
    public function show($id)
    {
        $berkas = Berkas::with('anakMagang.institusi')->findOrFail($id);
        return view('berkas.show', compact('berkas'));
    }
}
