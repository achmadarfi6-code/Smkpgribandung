<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
    {
        return view('daftar.index');
    }

    public function store(Request $request)
    {
        // Validasi sesuai kebutuhan
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048', // contoh validasi foto
        ]);

        // Proses simpan data, misalnya ke model Ekstrakulikuler
        // Ekstrakulikuler::create($request->all());

        // Redirect balik ke halaman daftar dengan pesan sukses
        return redirect()->route('daftar.index')->with('success', 'Data berhasil disimpan!');
    }
}
