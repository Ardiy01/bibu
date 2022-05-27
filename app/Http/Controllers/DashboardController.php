<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        for ($bulan = 1; $bulan < 13; $bulan++) {
            $pendapatan = collect(DB::SELECT("SELECT SUM(jumlah_produk * harga_produk) AS jumlah FROM pesanans WHERE month(created_at)= '$bulan' AND YEAR(NOW())"))->first();
            $pengeluaran = collect(DB::SELECT("SELECT SUM(nominal) AS jumlah FROM transaksis WHERE id_jenis_transaksi = 2 AND month(updated_at)= '$bulan' AND YEAR(NOW())"))->first();
            $data_pendapatan[] = $pendapatan->jumlah + 0;
            $data_pengeluaran[] = $pengeluaran->jumlah + 0;
        }

        if(request()->ajax()){
            $query = $request->get('value');
            $pdp = DB::table('transaksis')->where('id_jenis_transaksi', 1)->whereMonth('updated_at', $query)->sum('nominal');
            $png = DB::table('transaksis')->where('id_jenis_transaksi', 2)->whereMonth('updated_at', $query)->sum('nominal');

            $laba = $pdp - $png;
            $pemasukan = $pdp/30;

            $data = array(
                'laba' => $laba,
                'pemasukan' => $pemasukan
            );

            return Response($data);

        } else{
            $month = Carbon::now()->format('m');
            $bulan = Carbon::now()->isoFormat('MMMM');

            $pdp = DB::table('transaksis')->where('id_jenis_transaksi', 1)->whereMonth('updated_at', $month)->sum('nominal');
            $png = DB::table('transaksis')->where('id_jenis_transaksi', 2)->whereMonth('updated_at', $month)->sum('nominal');
        }

        $tahun = Carbon::now()->format('Y');
        $data_bulan = DB::table('transaksis')->select(DB::raw("MONTHNAME(updated_at) as bulan, MONTH(updated_at) as value"))->distinct()->paginate(8);

        // customer
        $data_produk = DB::table('produks')->join('pesanans', 'produks.id', '=', 'pesanans.id_produk')->select(DB::raw("produks.*, COUNT(pesanans.id_produk) AS total"))->where('pesanans.id_user', auth()->user()->id)->where('pesanans.id_status_pesanan', '=', 4)->groupBy('pesanans.id_produk')->orderBy('total', 'DESC')->paginate(2);
        $produks = DB::table('produks')->join('ulasans', 'produks.id', '=', 'ulasans.id_produk')->select(DB::raw("produks.*, AVG(ulasans.rating) AS rat"))->groupBy('ulasans.id_produk')->orderBy('rat', 'DESC')->paginate(2);

        return view('dashboard.index', [
            'data_pendapatan' => $data_pendapatan,
            'data_pengeluaran' => $data_pengeluaran,
            'pendapatan' => $pdp,
            'pengeluaran' => $png,
            'bulan' => $data_bulan,
            'tahun' => $tahun,
            'produkUser' => $data_produk,
            'produk' => $produks
        ]);
    }
}
