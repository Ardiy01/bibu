<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Carbon\Carbon;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->start_date && request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $transaksi = Transaksi::whereDate('updated_at','>=',$start_date)->whereDate('updated_at','<=',$end_date)->latest()->paginate(7);
        } else {
            $transaksi = Transaksi::latest()->paginate(7);
        }
        //
        return view('dashboard.transaksi.index', [
            'transaksi' => $transaksi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.transaksi.create');
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
        $data = [
            'jumlah' => 'required',
            'deskripsi' => 'required|max:255'
        ];

        $validateData = $request->validate($data);

        $pengeluaran = Pengeluaran::create($validateData);

        $transaksi = Transaksi::create([
            'keterangan' => $pengeluaran->deskripsi,
            'nominal' => $pengeluaran->jumlah,
            'id_pengeluaran' => $pengeluaran->id,
            'id_jenis_transaksi' => 2
        ]);

        $pengeluaran->save();
        $transaksi->save();

        alert()->success('Tambah Transaksi', 'Data Berhasil Disimpan')->showConfirmButton('Ok')->showCloseButton('true');
        return redirect('/dashboard/transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
        return view('dashboard.transaksi.detail', [
            'transaksi' => $transaksi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
        return view('dashboard.transaksi.update', [
            'pengeluaran' => $transaksi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
        $idP = $transaksi->id_pengeluaran;
        $data = [
            'nominal' => 'required',
            'keterangan' => 'required|max:255'
        ];

        $validateData = $request->validate($data);

        Transaksi::where('id', $transaksi->id)
                    ->update($validateData);
        Pengeluaran::where('id', $idP)
                    ->update([
                        'jumlah' => $request->nominal,
                        'deskripsi' => $request->keterangan
                    ]);

        alert()->success('Update Transaksi', 'Data Berhasil Disimpan')->showConfirmButton('Ok')->showCloseButton('true');
        return redirect('/dashboard/transaksi/' . $transaksi->id);
    }
}
