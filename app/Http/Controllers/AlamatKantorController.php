<?php

namespace App\Http\Controllers;

use App\Models\AlamatKantor;
use App\Models\Kantor;
use Illuminate\Http\Request;

class AlamatKantorController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $alamatKantor = AlamatKantor::findOrFail($id);
        return view('alamat.show', compact('alamatKantor'));
    }

    public function create($id)
    {
        // Verifikasi jika kantor dengan id yang diberikan ada
        $kantor = Kantor::findOrFail($id);

        return view('alamat.create', compact('kantor'));
    }

    public function store(Request $request)
    {
        // Validasi data dari formulir
        $validatedData = $request->validate([
            'jalan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'kantor_id' => 'required|exists:kantor,id_kantor', // Pastikan `kantor_id` sesuai
        ]);

        // Simpan data alamat
        AlamatKantor::create($validatedData);

        // Redirect ke halaman daftar kantor dengan pesan sukses
        return redirect()->route('kantor.index')->with('success', 'Alamat berhasil ditambahkan.');
    }

    // Menampilkan formulir edit alamat
    public function edit(AlamatKantor $alamatKantor)
    {
        return view('alamat.edit', compact('alamatKantor'));
    }

    // Menyimpan perubahan alamat
    public function update(Request $request, AlamatKantor $alamatKantor)
    {
        $request->validate([
            'jalan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
        ]);

        $alamatKantor->update([
            'jalan' => $request->jalan,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
        ]);

        return redirect()->route('kantor.index', $alamatKantor->kantor_id)
            ->with('success', 'Alamat berhasil diperbarui');
    }
}
