<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kantor</title>
</head>

<body>
    <h1>Edit Kantor</h1>

    @if (session('success'))
    <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('kantor.update', $kantor->id_kantor) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama_kantor">Nama Kantor:</label>
        <input type="text" id="nama_kantor" name="nama_kantor" value="{{ $kantor->nama_kantor }}" required>
        <br>

        <label for="kode_pos_alamat">Kode Pos:</label>
        <input type="text" id="kode_pos_alamat" name="kode_pos_alamat" value="{{ $kantor->alamatKantor->kode_pos_alamat ?? '' }}">
        <br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('kantor.index') }}">Kembali ke Daftar Kantor</a>
</body>

</html>