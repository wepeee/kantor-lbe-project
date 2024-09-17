<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kantor</title>
</head>

<body>
    <h1>Detail Kantor: {{ $kantor->nama_kantor }}</h1>

    <p>
        Alamat:
        @if ($kantor->alamatKantor)
        {{ $kantor->alamatKantor->jalan }}, {{ $kantor->alamatKantor->kota }}, {{ $kantor->alamatKantor->kode_pos }}
        @else
        Belum ada alamat
        @endif
    </p>

    <h2>Daftar Karyawan:</h2>
    <ul>
        @forelse ($kantor->karyawan as $karyawan)
        <li>
            {{ $karyawan->nama_karyawan }} ({{ $karyawan->nohp_karyawan }})
            <a href="{{ route('karyawan.edit', $karyawan->id_karyawan) }}">Edit</a>
            <form action="{{ route('karyawan.destroy', $karyawan->id_karyawan) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
            </form>
        </li>
        @empty
        <li>Tidak ada karyawan.</li>
        @endforelse
    </ul>

    <h2>Tambah Karyawan:</h2>
    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf
        <input type="hidden" name="fk_id_kantor" value="{{ $kantor->id_kantor }}">
        <label for="nama_karyawan">Nama Karyawan:</label>
        <input type="text" id="nama_karyawan" name="nama_karyawan" required>
        <br>
        <label for="nohp_karyawan">No. HP Karyawan:</label>
        <input type="text" id="nohp_karyawan" name="nohp_karyawan" required>
        <br>
        <button type="submit">Tambah Karyawan</button>
    </form>

    <a href="{{ url('/kantor') }}">Kembali ke Daftar Kantor</a>
</body>

</html>