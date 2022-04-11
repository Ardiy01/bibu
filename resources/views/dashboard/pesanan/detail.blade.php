@extends('dashboard.layouts.main')

@section('content')
<div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
    <div class="container my-3">
        <div class="card shadow sty-card">
            <div class="card-header mb-0 pb-0 hd pt-0 mt-0">
                <div class="row mx-2 my-2">
                    <div class="col-8 my-auto fw-bold text-uppercase" style="color: #007C84;">
                        <a href="/dashboard/pesanan" class="mx-1 text-center"><</a>
                        Detail pesanan
                    </div>
                    <div class="col-4 text-end mb-0">
                        <a href="/dashboard/pesanan/{{ $pesanan->id }}/edit" class="btn sty-btn-edit"> 
                            <span class="iconify" data-icon="akar-icons:edit" style="color: #007c84; font-size: 1.2rem; "></span>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="mt-0 mb-0" style="background-color: rgba(0, 124, 132, 0.2);">
            <div class="card-body mt-0 mx-sm-0 mx-0">
                <div class="card-body mt-0 mx-1">
                    <table cellpadding="4">
                        @if ($pesanan->user->rule != 'Pemilik')
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Nama</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $pesanan->user->nama }}</td>
                        </tr>     
                        @endif
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Nama Produk</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $pesanan->produk->nama_produk }}</td>
                        </tr>
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Jumlah Pesanan</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $pesanan->jumlah_produk }} Kg</td>
                        </tr>
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Alamat</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $pesanan->user->jalan . ' No. ' . $pesanan->user->nomor . ' Kec. ' . $pesanan->user->kecamatan->nama_kecamatan .', Kab. '. $pesanan->user->kabupaten->nama_kabupaten}}</td>
                        </tr>
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Status Pembayaran</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $pesanan->status_pembayaran->status_pembayaran }}</td>
                        </tr>
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Status Pesanan</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $pesanan->status_pesanan->status_pesanan }}</td>
                        </tr>
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Metode Pembayaran</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $pesanan->metode_pembayaran->metode_pembayaran }}</td>
                        </tr>
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Total Harga Pesanan</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">@currency($pesanan->jumlah_produk * $pesanan->produk->harga)</td>
                        </tr>
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Jenis Pengiriman</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $pesanan->pengiriman->nama_pengiriman }}</td>
                        </tr>

                        {{-- cek milik pemilik --}}
                        @if ($pesanan->id_user == 1)
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Deskripsi</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $pesanan->deskripsi }}</td>
                        </tr>
                        @endif

                        {{-- cek metode pengiriman --}}
                        @if ($pesanan->pengiriman->id != 1)
                            <tr>
                                <td class="fs-6" style="padding-right: 1rem;">Nomor Resi</td>
                                <td>:</td>
                                <td class="fs-6" style="padding-left: 0.6rem;">{{ $pesanan->no_resi }}</td>
                            </tr>    
                            <tr>
                                <td class="fs-6" style="padding-right: 1rem;">Ongkir</td>
                                <td>:</td>
                                <td class="fs-6" style="padding-left: 0.6rem;">@currency($pesanan->ongkir)</td>
                            </tr>    
                        @endif


                        {{-- cek metode pembayaran --}}
                        @if ($pesanan->metode_pembayaran->id != 1)
                            <tr>
                                <td class="fs-6" valign="top" rowspan="5" style="padding-right: 1rem; margin-top: -40rem">Bukti Pembayaran</td>
                                <td valign="top">:</td>
                                <td rowspan="2" class="fs-6" style="padding-left: 0.6rem;"><img src="{{ asset('storage/'.$pesanan->bukti_pembayaran) }}" style="max-width: 15rem" class="rounded float-start" alt="{{ $pesanan->bukti_pembayaran }}"></td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection