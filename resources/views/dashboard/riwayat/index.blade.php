@extends('dashboard.layouts.main')

@section('content')
<div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
    <div class="mx-4" style="color: #007c84">
        <form action="/dashboard/riwayatpesanan" method="get">
            <div class="row mb-2" style="max-width: 24.5rem;">
                <label for="start_date" class="form-label col-sm-5 col-12 m-auto">Pilih Rentang Tanggal:</label>
                <div class="col-sm-7 col-12 mt-1" style="max-width: 15rem;">
                    <input type="date" class="form-control" style=" border-radius: 12px;" id="start_date" name="start_date">
                </div>
            </div>
            <div class="row mb-3" style="max-width: 24.5rem;">
                <label for="end_date" class="form-label col-sm-5 col-12 m-auto">Pilih Rentang Tanggal:</label>
                <div class="col-sm-7 col-12 mt-1" style="max-width: 15rem;">
                    <input type="date" class="form-control" style=" border-radius: 12px;" id="end_date" name="end_date">
                </div>
            </div>
            <div class="text-sm-start text-center" style="margin-left: 10rem;">

                <button class="btn mb-2 text-light px-4" type="submit" style="background-color: #007C84;  border-radius: 10px">Cari</button>
            </div>
        </form>
    </div>
    @foreach ($riwayats as $riwayat)
    @if ($riwayat->count())
        <a href="/dashboard/ulasanproduk/{{ $riwayat->id }}" style="text-decoration: none">
        <div class="container my-3 zoom">
            @if ($riwayat->id_user != 1)
            <div class="sty-card card-melihat">   
            @else
            <div class="sty-card card-off">  
            @endif
                <div class="card-header mb-0 pb-0 hd">
                    <div class="d-flex justify-content-between mx-3">
                        <div class="mb-0 pb-0">
                            <h6 class="fw-bold text-uppercase mb-0 psn-produk">{{ $riwayat->produk->nama_produk }}</h6>
                            <p class="mb-0">{{ $riwayat->user->nama }}</p>
                        </div>
                        <div class="my-auto">
                            <p class="py-sm-1 px-sm-2 almt mb-0">
                                <span class="iconify" data-icon="arcticons:mapsgo" style="color: #007c84;"></span>
                                {{ $riwayat->user->jalan . ' No. ' . $riwayat->user->nomor . ' Kec. ' . $riwayat->user->kecamatan->nama_kecamatan .', Kab. '. $riwayat->user->kabupaten->nama_kabupaten}}
                            </p>
                        </div>
                    </div>
                </div>
                <hr class="mt-0 mb-0" style="background-color: rgba(0, 124, 132, 0.2);">
                <div class="card-body mt-0">
                    <div class="row">
                        <div class="col-sm-3 col-12">
                            <div class="text-center">
                                <img src="{{ asset('storage/' .$riwayat->produk->gambar) }}" class="rounded m-auto" alt="{{ $riwayat->produk->nama_produk }}" style="max-width: 12rem;">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="d-flex align-items-start flex-column bd-highlight" style="height: 100%;">
                                <p class="fw-bold text-uppercase p-2 nm-produk" style="margin-bottom: -15px;">{{ $riwayat->produk->nama_produk }}</p>
                                <p class="mb-auto p-2 bd-highlight text-capitalize text"> {{ $riwayat->produk->keterangan }} </p>
                            </div>
                        </div>
                        <div class="col-sm-3 col-12 mb-0 mt-0">
                            <div class="d-flex flex-column bd-highlight mb-0 text-center">
                                <div class="bd-highlight">
                                    <p>Jumlah Produk</p>
                                    <p class="fw-bold" style="margin-top: -18px;">{{ $riwayat->jumlah_produk }} Kg</p>
                                </div>
                                <div class="bd-highlight" style="margin-top: -15px;">
                                    <p>Status Pembayaran</p>
                                    <p class="mx-5 py-1" style="margin-top: -10px; background-color:#007C84; color: white; border-radius: 10px">{{ $riwayat->status_pembayaran->status_pembayaran }}</p>
                                </div>
                                <div class="bd-highlight" style="margin-top: -15px;">
                                    <p>Status Pesanan</p>
                                    <p class="mx-5 py-1 mb-0" style="margin-top: -10px; background-color:#007C84; color: white; border-radius: 10px">{{ $riwayat->status_pesanan->status_pesanan }}</p>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </a>
    @else
        <h4 class="text-center m-auto">Belum ada Pesanan</h4>
    @endif
    @endforeach
    <div class="d-flex justify-content-center my-3">
        {{ $riwayats->links() }}
    </div>
</div>
@endsection