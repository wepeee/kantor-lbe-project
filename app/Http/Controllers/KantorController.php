<?php

namespace App\Http\Controllers;

use App\Models\Kantor;
use App\Models\AlamatKantor;
use Illuminate\Http\Request;

class KantorController extends Controller
{
    public function index()
    {
        // Menampilkan daftar kantor tanpa detail karyawan
        $kantor = Kantor::all();
        return view('kantor.index', compact('kantor'));
    }

    public function show($id)
    {
        // Menampilkan detail kantor dan karyawan berdasarkan ID
        $kantor = Kantor::with(['karyawan', 'alamatKantor'])->findOrFail($id);
        return view('kantor.show', compact('kantor'));
    }

    public function create()
    {
        return view('kantor.create');
    }

    public function store(Request $request)
    {
        // Validasi data dari formulir
        $validatedData = $request->validate([
            'nama_kantor' => 'required|string|max:255',
        ]);

        // Simpan data kantor
        $kantor = Kantor::create([
            'nama_kantor' => $validatedData['nama_kantor'],
        ]);

        // Redirect ke halaman create alamat dengan ID kantor yang baru dibuat
        return redirect()->route('alamat.create', ['id' => $kantor->id_kantor])
            ->with('success', 'Kantor berhasil ditambahkan. Silakan tambahkan alamat.');
    }

    public function destroy($id)
    {
        // Temukan kantor berdasarkan ID
        $kantor = Kantor::findOrFail($id);

        // Hapus entri terkait di alamat_kantor jika ada
        $kantor->alamatKantor()->delete();

        // Hapus kantor
        $kantor->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('kantor.index')->with('success', 'Kantor berhasil dihapus.');
    }
}
