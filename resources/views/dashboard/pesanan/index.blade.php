@extends('dashboard.layouts.main')

@section('content')
    <h4 class="text-center mt-3 bg-primary py-2 text-light rounded-3">Pesanan</h4>

    {{-- tombol create pesanan --}}
    <a href="/dashboard/pesanan/create" class="btn btn-primary rounded-3 my-2">Tambah Pesanan &ensp; <span data-feather="plus"></span></a>

    @if ($pesanan->count())
        <div class="container">
            <div class="row my-1 d-flex justify-content-center">
                @foreach ($pesanan as $psn) 
                <div class="col-12 col-sm-3 my-2 d-flex justify-content-center">
                        <a href="/dashboard/pesanan/{{ $psn->id }}" style="text-decoration: none; color: black;">
                        <div class="card  shadow hover-card-produk" style="width: 18rem;">
                            <div class="card-body">
                                <img src="{{ asset('storage/' .$psn->produk->gambar) }}" class="card-img-top d-block overflow-hidden m-auto" alt="{{ $psn->produk->nama_produk }}" style="max-height: 9rem;">
                                <h5 class="card-title text-center text-capitalize mt-2">{{ $psn->produk->nama_produk }}</h5>
                                <p class="card-text ">Nama Pembeli : <span class="text-capitalize">{{ $psn->user->nama }}</span></p>
                                <p class="card-text">Jumlah &nbsp;&nbsp;&nbsp;: <span>{{ $psn->jumlah_produk }} kg</span></p>
                                <p class="card-text">Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span>Rp. {{ $psn->jumlah_produk * $psn->produk->harga }}</span></p>

                                {{-- cek status --}}
                                @if ($psn->status_pesanan->status_pesanan == 'Belum Diverifikasi')
                                    <p class="card-text">Status &nbsp;&nbsp;&nbsp;&nbsp;: <span class=" bg-danger rounded-2 px-2 text-light py-1">{{ $psn->status_pesanan->status_pesanan}}</span></p>
                                @endif
                                @if($psn->status_pesanan->status_pesanan == 'Diproses')
                                    <p class="card-text">Status &nbsp;&nbsp;&nbsp;&nbsp;: <span class=" bg-warning rounded-2 px-2 text-light py-1">{{ $psn->status_pesanan->status_pesanan }}</span></p>
                                @endif
                                @if($psn->status_pesanan->status_pesanan == 'Dikirim')
                                    <p class="card-text">Status &nbsp;&nbsp;&nbsp;&nbsp;: <span class=" bg-primary rounded-2 px-2 text-light py-1">{{ $psn->status_pesanan->status_pesanan }}</span></p>
                                @endif
                                @if($psn->status_pesanan->status_pesanan == 'Selesai')
                                    <p class="card-text bg-succes">Status &nbsp;&nbsp;&nbsp;&nbsp;: <span class=" bg-success rounded-2 px-2 text-light py-1">{{ $psn->status_pesanan->status_pesanan }}</span></p>
                                @endif
                                {{-- end cek status --}}
                            
                            </div>
                            <div class="d-flex justify-content-end mx-2">
                                <ul class="icons">
                                    <li>
                                        <a href="/dashboard/pesanan/{{ $psn->id }}/edit" class="badge btn-warning"><span data-feather="edit"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
        @endforeach

            </div>
        </div>
    @else
        <h4 class="text-center m-auto">Belum ada Pesanan</h4>
    @endif
    <div class="d-flex justify-content-center my-3">
        {{ $pesanan->links() }}
    </div>
@endsection