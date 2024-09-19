<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>
    <link href="../../style.css" rel="stylesheet">
</head>

<body>
    <nav>
        <h1>Website Kantor.</h1>
    </nav>
    <div class="container">
        <h1>Edit Karyawan</h1><br>

        @if (session('success'))
        <div class="notif-success">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        <form action="{{ route('karyawan.update', $karyawan->id_karyawan) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="nama_karyawan">Nama Karyawan:</label><br>
            <input type="text" id="nama_karyawan" name="nama_karyawan" value="{{ $karyawan->nama_karyawan }}" required>
            <br><br>
            <label for="nohp_karyawan">No. HP Karyawan:</label><br>
            <input type="text" id="nohp_karyawan" name="nohp_karyawan" value="{{ $karyawan->nohp_karyawan }}" required>
            <br><br>
            <input type="hidden" name="fk_id_kantor" value="{{ $karyawan->fk_id_kantor }}">
            <button type="submit">Simpan</button>
        </form>

        <a href="{{ route('kantor.show', $karyawan->fk_id_kantor) }}">Kembali ke Detail Kantor</a>
    </div>

</body>

</html>