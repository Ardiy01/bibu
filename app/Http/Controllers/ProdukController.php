<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.produk.index', [
            'produks' => Produk::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('pemilik');
        return view('dashboard.produk.create', [
            'jenis_produks' => JenisProduk::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->authorize('pemilik');
        $validateData = $request->validate([
            'nama_produk' => 'required|min:5',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|file|max:2048',
            'keterangan' => 'required|min:10',
            'id_jenis_produk' => 'required' 
        ]);
        $validateData['gambar'] = $request->file('gambar')->store('produk-images');
        Produk::create($validateData);

        alert()->success('Tambah Produk', 'Data Berhasil Disimpan')->showConfirmButton('Ok')->showCloseButton('true'); 
        return redirect('/dashboard/produk');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $this->authorize('pemilik');
        return view('dashboard.produk.update', [
            'produk' => $produk,
            'jenis_produks' => JenisProduk::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $this->authorize('pemilik');
        $data = [
            'nama_produk' => 'required|min:5',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|file|max:2048',
            'keterangan' => 'required|min:10',
            'id_jenis_produk' => 'required' 
        ];

        $validateData = $request->validate($data);

        if ($request->file('gambar')) {
            $images =  $request->file('gambar')->store('produk-images');
            $validateData['gambar'] = $images;
        } else {
            $images = $produk->gambar;
            $validateData['gambar'] = $images;
        }

        Produk::where('id', $produk->id)
            ->update($validateData);

        alert()->success('Update Produk', 'Data Berhasil Disimpan')->showConfirmButton('Ok')->showCloseButton('true'); 
        return redirect('/dashboard/produk');
    }
}
