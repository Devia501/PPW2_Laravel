<form method="GET" action="{{ route('buku.index') }}" class="mb-3">
    <select name="penulis" onchange="this.form.submit()">
        <option {{ $penulis=='Semua Penulis'?'selected':'' }}>Semua Penulis</option>
        @foreach(\App\Models\Buku::select('penulis')->distinct()->pluck('penulis') as $p)
            <option {{ $penulis==$p?'selected':'' }}>{{ $p }}</option>
        @endforeach
    </select>

    <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari judul buku">
    <button type="submit">Cari</button>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th><th>Judul Buku</th><th>Penulis</th>
            <th>Harga</th><th>Tanggal Terbit</th>
        </tr>
    </thead>
    <tbody>
    @php $no=1; @endphp
    @forelse($data_buku as $b)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $b->judul }}</td>
            <td>{{ $b->penulis }}</td>
            <td>{{ 'Rp '.number_format($b->harga,0,',','.') }}</td>
            <td>{{ \Carbon\Carbon::parse($b->tgl_terbit)->format('d/m/Y') }}</td>
        </tr>
    @empty
        <tr><td colspan="5">Buku tidak ditemukan.</td></tr>
    @endforelse
    </tbody>
</table>

<div class="stats">
    <p><b>Total Buku:</b> {{ $total_buku }}</p>
    <p><b>Total Harga:</b> Rp {{ number_format($total_harga,0,',','.') }}</p>
    <p><b>Harga Tertinggi:</b> Rp {{ number_format($harga_tertinggi,0,',','.') }}</p>
    <p><b>Harga Terendah:</b> Rp {{ number_format($harga_terendah,0,',','.') }}</p>
</div>

<h4>Buku Terbaru</h4>
<ul>
@foreach($buku_terbaru as $b)
    <li>{{ $b->judul }} ({{ \Carbon\Carbon::parse($b->tgl_terbit)->format('d/m/Y') }})</li>
@endforeach
</ul>
