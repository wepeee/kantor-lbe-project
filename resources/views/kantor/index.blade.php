<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kantor</title>
</head>

<body>
    <h1>Daftar Kantor</h1>

    @if (session('success'))
    <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('kantor.create') }}">Tambah Kantor</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>ID Kantor</th>
                <th>Nama Kantor</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kantor as $k)
            <tr>
                <td>{{ $k->id_kantor }}</td>
                <td>{{ $k->nama_kantor }}</td>
                <td>
                    @if ($k->alamatKantor)
                    <a href="{{ route('kantor.show', $k->id_kantor) }}">Lihat Karyawan</a>
                    <p><strong>Jalan:</strong> {{ $k->alamatKantor->jalan }}</p>
                    <p><strong>Kota:</strong> {{ $k->alamatKantor->kota }}</p>
                    <p><strong>Kode Pos:</strong> {{ $k->alamatKantor->kode_pos }}</p>
                    <p><strong>Kantor:</strong> {{ $k->alamatKantor->kantor->nama_kantor }}</p>

                    @else
                    Belum ada alamat
                    @endif
                </td>
                <td>
                    @if ($k->alamatKantor)
                    <a href="{{ route('alamatKantor.edit', $k->alamatKantor->id_alamat) }}">Edit Alamat</a>
                    @else
                    Belum ada alamat
                    @endif
                    <form action="{{ route('kantor.destroy', $k->id_kantor) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>