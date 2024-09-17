<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Alamat Kantor</title>
</head>

<body>
    <h1>Edit Alamat untuk Kantor: {{ $alamatKantor->kantor->nama_kantor }}</h1>

    <form action="{{ route('alamatKantor.update', $alamatKantor->id_alamat) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="jalan">Jalan:</label>
        <input type="text" name="jalan" id="jalan" value="{{ $alamatKantor->jalan }}" required>
        <br><br>
        <label for="kota">Kota:</label>
        <input type="text" name="kota" id="kota" value="{{ $alamatKantor->kota }}" required>
        <br><br>
        <label for="kode_pos">Kode Pos:</label>
        <input type="text" name="kode_pos" id="kode_pos" value="{{ $alamatKantor->kode_pos }}" required>
        <br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>

    <a href="{{ route('kantor.index') }}">Kembali home</a>
</body>

</html>