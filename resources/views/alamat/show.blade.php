<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Alamat Kantor</title>
</head>

<body>
    <h1>Detail Alamat Kantor</h1>

    <p><strong>Jalan:</strong> {{ $alamatKantor->jalan }}</p>
    <p><strong>Kota:</strong> {{ $alamatKantor->kota }}</p>
    <p><strong>Kode Pos:</strong> {{ $alamatKantor->kode_pos }}</p>
    <p><strong>Kantor:</strong> {{ $alamatKantor->kantor->nama_kantor }}</p>

    <a href="{{ route('kantor.index') }}">Kembali ke Daftar Kantor</a>
</body>

</html>