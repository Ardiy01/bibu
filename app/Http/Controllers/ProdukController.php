<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use App\Models\Ulasan;
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
        return view('dashboard.produk.create', []);
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

        $validateData = $request->validate([
            'nama_produk' => 'required|min:5',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|file|max:2048',
            'keterangan' => 'required|min:10'
        ]);
        $validateData['gambar'] = $request->file('gambar')->store('produk-images');
        Produk::create($validateData);

        return redirect('/dashboard/produk')->with('succes', 'Data Produk Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('dashboard.produk.update', [
            'produk' => $produk,
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

        $data = [
            'nama_produk' => 'required|min:5',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|file|max:2048',
            'keterangan' => 'required|min:10'
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

        return redirect('/dashboard/produk')->with('succes', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
