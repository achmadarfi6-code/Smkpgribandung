<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    // Tampilkan form pendaftaran
    public function create()
    {
        return view('ppdb.create');
    }

    // Simpan data pendaftaran
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pendaftaran = new Pendaftaran();
        $pendaftaran->nama = $request->nama;
        $pendaftaran->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $filename = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads/ppdb'), $filename);
            $pendaftaran->foto = $filename;
        }

        $pendaftaran->save();

        return redirect()->route('ppdb')->with('success', 'Pendaftaran berhasil disimpan!');
    }
}
