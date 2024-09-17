<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class KaryawanController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'fk_id_kantor' => 'required|exists:kantor,id_kantor', // Pastikan kolom dan tabel sesuai
            'nama_karyawan' => 'required|string|max:255',
            'nohp_karyawan' => 'required|string|max:15',
        ]);

        // Simpan data ke database
        Karyawan::create([
            'fk_id_kantor' => $request->input('fk_id_kantor'),
            'nama_karyawan' => $request->input('nama_karyawan'),
            'nohp_karyawan' => $request->input('nohp_karyawan'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Karyawan berhasil ditambahkan.');
    }

    // Menampilkan formulir untuk mengedit karyawan
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    // Menyimpan perubahan edit karyawan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'nohp_karyawan' => 'required|string|max:15',
            'fk_id_kantor' => 'required|exists:kantor,id_kantor',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update([
            'nama_karyawan' => $request->input('nama_karyawan'),
            'nohp_karyawan' => $request->input('nohp_karyawan'),
            'fk_id_kantor' => $request->input('fk_id_kantor'),
        ]);

        return redirect()->route('kantor.show', $karyawan->fk_id_kantor)->with('success', 'Karyawan berhasil diperbarui.');
    }

    // Menghapus karyawan
    public function destroy($id)
    {
        $karyawan = Karyawan::where('id_karyawan', $id)->firstOrFail();
        $karyawan->delete();

        return redirect()->route('kantor.show', $karyawan->fk_id_kantor)->with('success', 'Karyawan berhasil dihapus.');
    }
}
