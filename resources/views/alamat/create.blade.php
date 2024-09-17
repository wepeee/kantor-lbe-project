<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alamat</title>
</head>

<body>
    <h1>Tambah Alamat untuk Kantor: {{ $kantor->nama_kantor }}</h1>

    @if (session('success'))
    <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('alamat.store') }}" method="POST">
        @csrf
        <input type="hidden" name="kantor_id" value="{{ $kantor->id_kantor }}">

        <label for="jalan">Jalan:</label>
        <input type="text" id="jalan" name="jalan" required>
        <br>

        <label for="kota">Kota:</label>
        <input type="text" id="kota" name="kota" required>
        <br>

        <label for="kode_pos">Kode Pos:</label>
        <input type="text" id="kode_pos" name="kode_pos" required>
        <br>

        <button type="submit">Simpan Alamat</button>
    </form>

    <a href="{{ route('kantor.index') }}">Kembali ke Daftar Kantor</a>
</body>

</html>