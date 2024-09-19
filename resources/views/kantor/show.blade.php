<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kantor</title>
    <link href="../../style.css" rel="stylesheet">
</head>

<body>

    <nav>
        <h1>Website Kantor.</h1>
    </nav>

    @if (session('success'))
    <div class="notif-success">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <div class="container">
        <div class="header-daftar">
            <h1>Detail Kantor: {{ $kantor->nama_kantor }}</h1>

            <p>
                {{ $kantor->alamatKantor->jalan }}, {{ $kantor->alamatKantor->kota }}, {{ $kantor->alamatKantor->kode_pos }}
            </p>
        </div>


        <div class=" daftar-karyawan">
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
        </div>

        <div class="tambah-karyawan">
            <h2>Tambah Karyawan:</h2>
            <form action="{{ route('karyawan.store') }}" method="POST">
                @csrf
                <input type="hidden" name="fk_id_kantor" value="{{ $kantor->id_kantor }}">
                <label for="nama_karyawan">Nama Karyawan:</label><br>
                <input placeholder="nama karyawan la" type="text" id="nama_karyawan" name="nama_karyawan" required>
                <br><br>
                <label for="nohp_karyawan">No. HP Karyawan:</label><br>
                <input placeholder="nomernya dong dek" type="text" id="nohp_karyawan" name="nohp_karyawan" required>
                <br><br>
                <button type="submit">Tambah Karyawan</button>
            </form>
        </div>

        <a href="{{ url('/kantor') }}">Kembali ke Daftar Kantor</a>
    </div>

</body>

</html>