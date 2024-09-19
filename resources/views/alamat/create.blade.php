<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alamat</title>
    <link href="../../style.css" rel="stylesheet">
</head>

<body>

    <nav>
        <h1>Website Kantor.</h1>
    </nav>

    <div class="container">
        <h1> {{ $kantor->nama_kantor }}</h1><br>

        @if (session('success'))
        <div class="notif-success">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        <form action="{{ route('alamat.store') }}" method="POST">
            @csrf
            <input type="hidden" name="kantor_id" value="{{ $kantor->id_kantor }}">

            <label for="jalan">Jalan</label><br>
            <input placeholder="jalan kantor mu" type="text" id="jalan" name="jalan" required>
            <br>
            <br>

            <label for="kota">Kota</label><br>
            <input placeholder="kota kantor mu" type="text" id="kota" name="kota" required>
            <br>
            <br>

            <label for="kode_pos">Kode Pos:</label><br>
            <input placeholder="kode pos kantor mu" type="text" id="kode_pos" name="kode_pos" required>
            <br>
            <br>

            <button type="submit">Simpan Alamat</button>
        </form>

        <a href="{{ route('kantor.index') }}">Kembali ke Daftar Kantor</a>
    </div>


</body>

</html>