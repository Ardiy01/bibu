<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Ulasan;
use App\Models\Pesanan;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use App\Models\StatusPesanan;
use App\Models\MetodePembayaran;
use App\Models\StatusPembayaran;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.pesanan.index',[
            'pesananUser' => Pesanan::where('id', 2)->latest()->paginate(7), // Ambil pesanan milik user yang login
            'pesanan' => Pesanan::latest()->paginate(7),
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
        return view('dashboard.pesanan.create',[
            'users' => User::where('id', 2)->get(), // ubah id user dengan user login
            'metode' => MetodePembayaran::all(),
            'pembayaran' => StatusPembayaran::all(),
            'status' => StatusPesanan::all(),
            'ekspedisi' => Pengiriman::all(),
            'produk' => Produk::all()
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
        $data = [
            'id_produk' => 'required',
            'jumlah_produk' => 'required',
            'id_status_pembayaran' => 'required',
            'id_status_pesanan' => 'required',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg|file|max:2048',
            'id_metode_pembayaran' => 'required',
            'id_pengiriman' => 'required',
            'deskripsi' => 'nullable'
        ];

        
        $validateData = $request->validate($data);
        if($request->file('bukti_pembayaran')){
            $struk = $request->file('bukti_pembayaran')->store('struk-images');
            $validateData['bukti_pembayaran'] = $struk;
            
        }
        
        $validateData['id_user'] = 2; // ganti id user yang login
        $pesanan = Pesanan::create($validateData);
        
        // ulasan
        $ulasan = Ulasan::create([
            'id_pesanan' => $pesanan->id,
            'id_user' => $pesanan->id_user,
            'id_produk' => $pesanan->id_produk
        ]);

        $pesanan->save();
        $ulasan->save();

        alert()->success('Tambah Pesanan', 'Data Berhasil Disimpan')->showConfirmButton('Ok')->showCloseButton('true'); 
        return redirect('/dashboard/pesanan');


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
        return view('dashboard.pesanan.detail',[
            'pesanan' => $pesanan,
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
        //
        return view('dashboard.pesanan.update', [
            'pesan' => $pesanan,
            'metode' => MetodePembayaran::all(),
            'pembayaran' => StatusPembayaran::all(),
            'status' => StatusPesanan::all(),
            'ekspedisi' => Pengiriman::all(),
            'produk' => Produk::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $data = [
            'id_produk' => 'required',
            'jumlah_produk' => 'required',
            'id_status_pembayaran' => 'required',
            'id_status_pesanan' => 'required',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg|file|max:2048',
            'id_metode_pembayaran' => 'required',
            'id_pengiriman' => 'required',
            'no_resi' => 'nullable',
            'ongkir' => 'nullable',
            'deskripsi' => 'nullable'
        ];

        $validateData = $request->validate($data);

        if($request['no_resi']){
            $noResi = $request['no_resi'];
            $validateData['no_resi'] = $noResi;
        } else{
            $noResi = $pesanan->no_resi;
            $validateData['no_resi'] = $noResi;
        }

        if($request['ongkir']){
            $ongkir = $request['ongkir'];
            $validateData['ongkir'] = $ongkir;
        } else{
            $ongkir = $pesanan->ongkir;
            $validateData['ongkir'] = $ongkir;
        }

        if($request['deskripsi']){
            $deskripsi = $request['deskripsi'];
            $validateData['deskripsi'] = $deskripsi;
        } else{
            $deskripsi = $pesanan->deskripsi;
            $validateData['deskripsi'] = $deskripsi;
        }

        if ($request->file('bukti_pembayaran')) {
            $struks = $request->file('bukti_pembayaran')->store('struk-images');
            $validateData['bukti_pembayaran'] = $struks;
        } else {
            $struks = $pesanan->bukti_pembayaran;
            $validateData['bukti_pembayaran'] = $struks;
        }

        Pesanan::where('id', $pesanan->id)
            ->update($validateData);

        alert()->success('Update Pesanan', 'Data Berhasil Disimpan')->showConfirmButton('Ok')->showCloseButton('true'); 
        return redirect('/dashboard/pesanan/' . $pesanan->id . '/edit');
    }
}
