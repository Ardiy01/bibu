@extends('dashboard.layouts.main')

@section('content')
<div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
    <div class="container text-end">
        <a href="/dashboard/pesanan/create" class="btn sty-btn-edit"> 
            <span class="iconify" data-icon="akar-icons:plus" style="color: #007c84;"></span>
        </a>
    </div>
    @if ($pesanan->count())
    @foreach ($pesanan as $psn)
        <a href="/dashboard/pesanan/{{ $psn->id }}" style="text-decoration: none">
        <div class="container my-3 zoom">
            @if ($psn->user->rule != "Pemilik")
            <div class="sty-card card-melihat shadow">   
            @else
            <div class="sty-card card-off shadow">  
            @endif
                <div class="card-header mb-0 pb-0 hd">
                    <div class="d-flex justify-content-between mx-3">
                        <div class="mb-0 pb-0">
                            <h6 class="fw-bold text-uppercase mb-0 psn-produk">{{ $psn->produk->nama_produk }}</h6>
                            <p class="mb-0">{{ $psn->user->nama }}</p>
                        </div>
                        <div class="my-auto">
                            <p class="py-sm-1 px-sm-2 almt mb-0">
                                <span class="iconify" data-icon="arcticons:mapsgo" style="color: #007c84;"></span>
                                {{ $psn->user->jalan . ' No. ' . $psn->user->nomor . ' Kec. ' . $psn->user->kecamatan->nama_kecamatan .', Kab. '. $psn->user->kabupaten->nama_kabupaten}}
                            </p>
                        </div>
                    </div>
                </div>
                <hr class="mt-0 mb-0" style="background-color: rgba(0, 124, 132, 0.2);">
                <div class="card-body mt-0">
                    <div class="row">
                        <div class="col-sm-3 col-12">
                            <div class="text-center">
                                <img src="{{ asset('storage/' .$psn->produk->gambar) }}" class="rounded m-auto" alt="{{ $psn->produk->nama_produk }}" style="max-width: 12rem;">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="d-flex align-items-start flex-column bd-highlight" style="height: 100%;">
                                <p class="fw-bold text-uppercase p-2 nm-produk" style="margin-bottom: -15px;">{{ $psn->produk->nama_produk }}</p>
                                <p class="mb-auto p-2 bd-highlight text-capitalize text"> {{ $psn->produk->keterangan }} </p>
                            </div>
                        </div>
                        <div class="col-sm-3 col-12 mb-0 mt-0">
                            <div class="d-flex flex-column bd-highlight mb-0 text-center">
                                <div class="bd-highlight">
                                    <p>Jumlah Produk</p>
                                    <p class="fw-bold" style="margin-top: -18px;">{{ $psn->jumlah_produk }} Kg</p>
                                </div>
                                <div class="bd-highlight" style="margin-top: -15px;">
                                    <p>Status Pembayaran</p>
                                    <p class="mx-5 py-1" style="margin-top: -10px; background-color:#007C84; color: white; border-radius: 10px">{{ $psn->status_pembayaran->status_pembayaran }}</p>
                                </div>
                                <div class="bd-highlight" style="margin-top: -15px;">
                                    <p>Status Pesanan</p>
                                    <p class="mx-5 py-1 mb-0" style="margin-top: -10px; background-color:#007C84; color: white; border-radius: 10px">{{ $psn->status_pesanan->status_pesanan }}</p>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </a>
    @endforeach
    @else
        <h4 class="text-center m-auto">Belum ada Pesanan</h4>
    @endif
    <div class="d-flex justify-content-center my-3">
        {{ $pesanan->links() }}
    </div>
</div>
         

@endsection