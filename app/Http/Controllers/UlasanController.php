<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ulasan  $ulasan
     * @return \Illuminate\Http\Response
     */
    public function show(ulasan $ulasan)
    {
        //
        return view('dashboard.ulasan.detail',[
            'ulasans' => Ulasan::where('id_produk', $ulasan->id)->latest()->paginate(7),
            'produk' => Produk::where('id', $ulasan)->get(),
            'rating' => Ulasan::where('id_produk', $ulasan->id)->get()
        ]);
    }
}
