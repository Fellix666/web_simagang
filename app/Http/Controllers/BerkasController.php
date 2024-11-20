<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\AnakMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerkasController extends Controller
{
    public function index($id_magang)
    {
        $magang = AnakMagang::findOrFail($id_magang);
        $berkas = Berkas::where(
            'id_magang',
            $id_magang
        )->get();
        return view('berkas.index', compact('magang', 'berkas'));
    }
    public function store(Request $request, $id_magang)
    {
        $validated = $request->validate([
            'nama_berkas' => 'required|max:50',
            'jenis_berkas' => 'required|max:50',
            'file' => 'required|file|max:2048' // Max 2MB
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('berkas');
            Berkas::create(['id_magang' => $id_magang, 'nama_berkas' => $validated['nama_berkas'], 'jenis_berkas' => $validated['jenis_berkas'], 'file_path' => $path]);
            return redirect()->route('berkas.index', $id_magang)->with('success', 'Berkas berhasil diunggah');
        }
        return back()->with('error', 'Gagal mengunggah berkas');
    }
    public function destroy($id)
    {
        $berkas = Berkas::findOrFail($id);
        if (Storage::exists($berkas->file_path)) {
            Storage::delete($berkas->file_path);
        }
        $berkas->delete();
        return back()->with('success', 'Berkas berhasil dihapus');
    }
}
