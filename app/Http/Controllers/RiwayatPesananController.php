<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ulasan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class RiwayatPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (request()->start_date && request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $riwayats = Pesanan::where('id_status_pesanan', 4)->whereBetween('created_at', [$start_date, $end_date])->latest()->paginate(7);
            $riwayatUser = Pesanan::where('id_status_pesanan', 4)->where('id_user', 2)->whereBetween('created_at', [$start_date, $end_date])->latest()->paginate(7); // ganti id user yang login
        } else {
            $riwayats = Pesanan::where('id_status_pesanan', 4)->latest()->paginate(7);
            $riwayatUser = Pesanan::where('id_status_pesanan', 4)->where('id_user', 2)->latest()->paginate(7);
        }

        return view('dashboard.riwayat.index', [
            'riwayatsUser' => $riwayatUser,
            'riwayats' => $riwayats
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan $pesanan)
    {
        //
        return view('dashboard.riwayat.detail', [
            'riwayat' => Pesanan::where('id', $pesanan->id)->get(),
            'ulasan' => Ulasan::where('id_pesanan', $pesanan->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {

        return view('dashboard.ulasan.update', [
            'ulasan' => $pesanan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ulasan  $ulasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
        $data = [
            'rating' => 'required',
            'ulasan' => 'required'
        ];

        $validateData = $request->validate($data);

        Ulasan::where('id_pesanan', $pesanan->id)
            ->update($validateData);

        alert()->success('Tambah Ulasan', 'Data Berhasil Disimpan')->showConfirmButton('Ok')->showCloseButton('true');
        return redirect('/dashboard/riwayat/pesanan/'. $pesanan->id);
    }
}
