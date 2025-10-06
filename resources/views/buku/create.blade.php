<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Buku</h1>

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <label>Judul:</label>
        <input type="text" name="judul" required><br><br>

        <label>Penulis:</label>
        <input type="text" name="penulis" required><br><br>

        <label>Harga:</label>
        <input type="number" name="harga" required><br><br>

        <label>Tanggal Terbit:</label>
        <input type="date" name="tgl_terbit" required><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('buku.index') }}">Kembali</a>
</body>
</html>
