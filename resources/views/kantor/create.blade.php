<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kantor</title>
    <link href="../style.css" rel="stylesheet">
</head>

<body>

    <nav>
        <h1>Website Kantor.</h1>
    </nav>

    <div class="container">
        <h1>Tambah Kantor</h1><br>

        @if (session('success'))
        <p>{{ session('success') }}</p>
        @endif

        <form action="{{ route('kantor.store') }}" method="POST">
            @csrf
            <label for="nama_kantor">Nama Kantor:</label><br><br>
            <input placeholder="nama kantor mu" type="text" id="nama_kantor" name="nama_kantor" required>
            <br>

            <button type="submit">Simpan</button>
        </form>

        <a href="{{ route('kantor.index') }}">Kembali ke Daftar Kantor</a>
    </div>

</body>

</html>