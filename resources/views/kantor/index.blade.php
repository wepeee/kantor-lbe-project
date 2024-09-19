<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kantor</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <nav>
        <h1>Website Kantor.</h1>
    </nav>
    <div class="container">
        <h1>Daftar Kantor</h1>

        @if (session('success'))
        <div class="notif-success">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        <a href="{{ route('kantor.create') }}">Tambah Kantor</a>
        <br><br>

        <table>
            <thead>
                <tr align="left">
                    <th>ID Kantor</th>
                    <th>Nama Kantor</th>
                    <th>Alamat</th>
                    <th align="center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kantor as $k)
                <tr>
                    <td>
                        <p>{{ $k->id_kantor }}</p>
                    </td>
                    <td>
                        <p>{{ $k->nama_kantor }}</p>
                    </td>
                    <td class="alamat">
                        @if ($k->alamatKantor)
                        <div class="table-data">
                            <table>
                                <tr>
                                    <td>
                                        <p><strong>Jalan</strong>
                                    </td>
                                    <td>:</td>
                                    <td>{{ $k->alamatKantor->jalan }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Kota</strong>
                                    </td>
                                    <td>:</td>
                                    <td>{{ $k->alamatKantor->kota }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Kode Pos</strong>
                                    </td>
                                    <td>:</td>
                                    <td>{{ $k->alamatKantor->kode_pos }}</td>
                                </tr>
                            </table>
                        </div>

                        @else
                        Belum ada alamat
                        @endif
                    </td>
                    <td align="right" class="aksi">
                        <a href="{{ route('kantor.show', $k->id_kantor) }}">Lihat Karyawan</a>
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
    </div>

</body>

</html>