<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_produk = DB::table('produks')->join('pesanans', 'produks.id', '=', 'pesanans.id_produk')->select(DB::raw("produks.*, COUNT(pesanans.id_produk) AS total"))->where('pesanans.id_status_pesanan', '=', 4)->groupBy('pesanans.id_produk')->orderBy('total', 'DESC')->paginate(2);
        return view('home', [
            'produks' => $data_produk,
        ]);
    }

}
