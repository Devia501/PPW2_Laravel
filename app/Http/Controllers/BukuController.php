<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $penulis = $request->get('penulis', 'Semua Penulis');
        $query = Buku::query();
        if ($penulis !== 'Semua Penulis') {
            $query->where('penulis', $penulis);
        }

        $cari = $request->get('cari');
        if ($cari) {
            $query->where('judul', 'like', "%$cari%");
        }

        $buku_terbaru = Buku::orderBy('tgl_terbit', 'desc')->take(5)->get();

        $data_buku = $query->orderBy('tgl_terbit', 'desc')->get();

        $total_buku = Buku::count();
        $total_harga = Buku::sum('harga');
        $harga_tertinggi = Buku::max('harga');
        $harga_terendah = Buku::min('harga');

        return view('index', compact(
            'data_buku','buku_terbaru','penulis','cari',
            'total_buku','total_harga','harga_tertinggi','harga_terendah'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
