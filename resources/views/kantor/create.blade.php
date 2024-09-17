<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kantor</title>
</head>

<body>
    <h1>Tambah Kantor</h1>

    @if (session('success'))
    <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('kantor.store') }}" method="POST">
        @csrf
        <label for="nama_kantor">Nama Kantor:</label>
        <input type="text" id="nama_kantor" name="nama_kantor" required>
        <br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('kantor.index') }}">Kembali ke Daftar Kantor</a>
</body>

</html>