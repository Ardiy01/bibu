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
            'ulasans' => Ulasan::where('id_produk', $ulasan->id)->latest()->paginate(5),
            'produk' => Produk::where('id', $ulasan)->get(),
            'rating' => Ulasan::where('id_produk', $ulasan->id)->get()
        ]);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\ulasan  $ulasan
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(ulasan $ulasan)
    // {
    //     //
    //     return view('dashboard.ulasan.update',[
    //         'ulasan' => $ulasan,
    //     ]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\ulasan  $ulasan
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, ulasan $ulasan)
    // {
    //     //
    //     $data = [
    //         'rating' => 'nullabel',
    //         'ulasan' => 'nullabel'
    //     ];

    //     $validateData = $request->validate($data);

    //     Ulasan::where('id', $ulasan->id)
    //         ->update($validateData);
        
    //     alert()->success('Tambah Ulasan', 'Data Berhasil Disimpan')->showConfirmButton('Ok')->showCloseButton('true'); 
    //     return redirect('/dashboard/produk/ulasan');

    // }
}
