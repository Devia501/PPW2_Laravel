<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">📚 Sistem Buku</a>
      <div class="d-flex align-items-center">
        <span class="text-white me-3">Halo, {{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <div class="card shadow-sm p-4 mb-4">
      <form method="GET" action="{{ route('buku.index') }}" class="row g-3 align-items-end">
        <div class="col-md-3">
          <label class="form-label">Filter Penulis</label>
          <select name="penulis" onchange="this.form.submit()" class="form-select">
            <option {{ $penulis=='Semua Penulis'?'selected':'' }}>Semua Penulis</option>
            @foreach(\App\Models\Buku::select('penulis')->distinct()->pluck('penulis') as $p)
              <option {{ $penulis==$p?'selected':'' }}>{{ $p }}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label">Cari Judul Buku</label>
          <input type="text" name="cari" value="{{ $cari }}" class="form-control" placeholder="Masukkan judul buku">
        </div>

        <div class="col-md-3 d-grid">
          <button type="submit" class="btn btn-primary">Cari</button>
        </div>
      </form>
    </div>

    <div class="mb-3">
      <a href="{{ route('buku.create') }}" class="btn btn-success">+ Tambah Buku</a>
    </div>

    <div class="card shadow-sm p-3">
      <table class="table table-striped align-middle">
        <thead class="table-primary">
          <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tanggal Terbit</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php $no=1; @endphp
          @forelse($data_buku as $b)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $b->judul }}</td>
            <td>{{ $b->penulis }}</td>
            <td>Rp {{ number_format($b->harga,0,',','.') }}</td>
            <td>{{ \Carbon\Carbon::parse($b->tgl_terbit)->format('d/m/Y') }}</td>
            <td>
              <a href="{{ route('buku.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('buku.destroy', $b->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin mau dihapus?')" class="btn btn-danger btn-sm">Hapus</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center text-muted">Buku tidak ditemukan.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="row mt-4 g-3">
      <div class="col-md-3">
        <div class="card text-center p-3 shadow-sm">
          <p class="text-muted mb-1">Total Buku</p>
          <h5>{{ $total_buku }}</h5>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center p-3 shadow-sm">
          <p class="text-muted mb-1">Total Harga</p>
          <h5>Rp {{ number_format($total_harga,0,',','.') }}</h5>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center p-3 shadow-sm">
          <p class="text-muted mb-1">Harga Tertinggi</p>
          <h5>Rp {{ number_format($harga_tertinggi,0,',','.') }}</h5>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center p-3 shadow-sm">
          <p class="text-muted mb-1">Harga Terendah</p>
          <h5>Rp {{ number_format($harga_terendah,0,',','.') }}</h5>
        </div>
      </div>
    </div>

    <div class="card shadow-sm p-4 mt-4">
      <h5 class="text-primary mb-3">📖 Buku Terbaru</h5>
      <ul class="list-group">
        @foreach($buku_terbaru as $b)
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $b->judul }}
            <span class="badge bg-secondary">{{ \Carbon\Carbon::parse($b->tgl_terbit)->format('d/m/Y') }}</span>
          </li>
        @endforeach
      </ul>
    </div>
  </div>

  <footer class="text-center py-3 text-muted small">
    © {{ date('Y') }} Sistem Buku Laravel Breeze
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
