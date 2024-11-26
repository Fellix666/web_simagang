<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\AnakMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerkasController extends Controller
{
    // Method to show the list of berkas
    public function index()
    {
        // Retrieve all berkas (without filtering by id_magang)
        $berkas = Berkas::all(); // Adjust this query as needed

        return view('berkas.index', compact('berkas'));
    }

    // Method to show the form for creating a new berkas
    public function create()
    {
        return view('berkas.create');
    }

    // Method to store a new berkas
    public function store(Request $request)
{
    $validated = $request->validate([
        'nama_berkas' => 'required|max:50',
        'jenis_berkas' => 'required|max:50',
        'file' => 'required|file|max:2048' // Max 2MB
    ]);

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $path = $file->store('berkas_photos', 'public'); // Save file to storage

    
        Berkas::create([ 
            'nama_berkas' => $validated['nama_berkas'],
            'jenis_berkas' => $validated['jenis_berkas'],
            'file_path' => ($path)
        ]);

        return redirect()->route('berkas.index')->with('success', 'Berkas berhasil diunggah');
    }

    return back()->with('error', 'Gagal mengunggah berkas');
}


    // Method to show the form for editing a berkas
    public function edit($id)
    {
        $berkas = Berkas::findOrFail($id);
        return view('berkas.edit', compact('berkas'));
    }

    // Method to update an existing berkas
    public function update(Request $request, $id)
{
    $berkas = Berkas::findOrFail($id);

    $validated = $request->validate([
        'nama_berkas' => 'required|max:50',
        'jenis_berkas' => 'required|max:50',
        'file' => 'nullable|file|max:2048', // Optional file validation
    ]);

    // If a new file is uploaded
    if ($request->hasFile('file')) {
        // Delete the old file from storage
        if (Storage::exists($berkas->file_path)) {
            Storage::delete($berkas->file_path);
        }

        // Store the new file
        $file = $request->file('file');
        $path = $file->store('berkas_photos', 'public');

        // Update the berkas record with the new file path
        $validated['file_path'] = $path;
    }

    // Update other fields
    $berkas->update($validated);

    return redirect()->route('berkas.index')->with('success', 'Berkas berhasil diperbarui');
}


    // Method to delete a berkas
    public function destroy($id)
    {
        $berkas = Berkas::findOrFail($id);

        // Delete the file from storage
        if (Storage::exists($berkas->file_path)) {
            Storage::delete($berkas->file_path);
        }

        // Delete the berkas record from the database
        $berkas->delete();

        return back()->with('success', 'Berkas berhasil dihapus');
    }
}
