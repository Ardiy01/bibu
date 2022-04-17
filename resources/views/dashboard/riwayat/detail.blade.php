
@extends('dashboard.layouts.main')

@section('content')
<div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
    <div class="container my-3">
        <div class="card shadow sty-card">
            <div class="card-header mb-0 pb-0 hd pt-0 mt-0">
                <div class="row mx-2 my-2">
                    <div class="col-8 my-auto fw-bold text-uppercase" style="color: #007C84;">
                        <a href="/dashboard/riwayat/pesanan" class="mx-1 text-center" style="text-decoration: none">
                            <span class="iconify fw-bold" data-icon="ooui:next-rtl" style="color: #007c84;"></span>
                        </a>
                        Detail pesanan
                    </div>
                    @foreach ($riwayat as $rwyt)
                        <div class="col-4 text-end mb-0" @if ($rwyt->user->rule == "Pemilik")
                            style="visibility: hidden;"
                        @endif>
                        @foreach ($ulasan as $uls)
                            <a href="/dashboard/riwayat/pesanan/{{ $rwyt->id}}/edit" class="btn sty-btn-edit" @if ($uls->rating > 0)
                                style="visibility: hidden"
                            @endif> 
                                <span class="iconify" data-icon="akar-icons:edit" style="color: #007c84; font-size: 1.2rem; "></span>
                            </a>
                            
                        @endforeach
                        </div>
                </div>
            </div>
            <hr class="mt-0 mb-0" style="background-color: rgba(0, 124, 132, 0.2);">
            <div class="card-body mt-0 mx-sm-0 mx-0">
                <div class="card-body mt-0 mx-1">
                    <table cellpadding="4">
                        @if ($rwyt->user->rule != 'Pemilik')
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Nama</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $rwyt->user->nama }}</td>
                        </tr>     
                        @endif
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Nama Produk</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $rwyt->produk->nama_produk }}</td>
                        </tr>
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Jumlah Pesanan</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $rwyt->jumlah_produk }} Kg</td>
                        </tr>
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Alamat</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $rwyt->user->jalan . ' No. ' . $rwyt->user->nomor . ' Kec. ' . $rwyt->user->kecamatan->nama_kecamatan .', Kab. '. $rwyt->user->kabupaten->nama_kabupaten}}</td>
                        </tr>
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Status Pembayaran</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $rwyt->status_pembayaran->status_pembayaran }}</td>
                        </tr>
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Status Pesanan</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $rwyt->status_pesanan->status_pesanan }}</td>
                        </tr>
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Metode Pembayaran</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $rwyt->metode_pembayaran->metode_pembayaran }}</td>
                        </tr>
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Total Harga Pesanan</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">@currency($rwyt->jumlah_produk * $rwyt->produk->harga)</td>
                        </tr>
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Jenis Pengiriman</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $rwyt->pengiriman->nama_pengiriman }}</td>
                        </tr>

                        {{-- cek milik pemilik --}}
                        @if ($rwyt->id_user == 1)
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Deskripsi</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $rwyt->deskripsi }}</td>
                        </tr>
                        @endif
                        
                        {{-- cek metode pengiriman --}}
                        @if ($rwyt->pengiriman->id != 1)
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Nomor Resi</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">{{ $rwyt->no_resi }}</td>
                        </tr>    
                        <tr>
                            <td class="fs-6" style="padding-right: 1rem;">Ongkir</td>
                            <td>:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;">@currency($rwyt->ongkir)</td>
                        </tr>    
                        @endif
                        
                        
                        {{-- cek metode pembayaran --}}
                        @if ($rwyt->metode_pembayaran->id != 1)
                        <tr>
                            <td class="fs-6" valign="top" style="padding-right: 1rem; margin-top: -40rem">Bukti Pembayaran</td>
                            <td valign="top">:</td>
                            <td class="fs-6" style="padding-left: 0.6rem;"><img src="{{ asset('storage/'.$rwyt->bukti_pembayaran) }}" style="max-width: 15rem" class="rounded float-start" alt="{{ $rwyt->bukti_pembayaran }}"></td>
                        </tr>
                        @endif
                        @foreach ($ulasan as $uls)
                        @if ($rwyt->user->rule != "Pemilik")
                            <tr>
                                <td class="fs-6" style="padding-right: 1rem;">Rating</td>
                                <td>:</td>
                                <td class="fs-6" style="padding-left: 0.6rem;">
                                    @for ($i = 0; $i < $uls->rating; $i++)
                                        <p class="d-inline"><span class="iconify" data-icon="ant-design:star-filled" style="color: #007c84;"></span></p>
                                    @endfor
                                </td>
                            </tr>   
                            <tr>
                                <td class="fs-6" style="padding-right: 1rem;">Ulasan</td>
                                <td>:</td>
                                <td class="fs-6" style="padding-left: 0.6rem;">{{ $uls->ulasan }}</td>
                            </tr>   
                            
                        @endif
                        @endforeach
                    </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
