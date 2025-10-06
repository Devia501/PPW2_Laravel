<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Buku</h1>

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Judul:</label>
        <input type="text" name="judul" value="{{ $buku->judul }}" required><br><br>

        <label>Penulis:</label>
        <input type="text" name="penulis" value="{{ $buku->penulis }}" required><br><br>

        <label>Harga:</label>
        <input type="number" name="harga" value="{{ $buku->harga }}" required><br><br>

        <label>Tanggal Terbit:</label>
        <input type="date" name="tgl_terbit" value="{{ $buku->tgl_terbit->format('Y-m-d') }}" required><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('buku.index') }}">Kembali</a>
</body>
</html>
