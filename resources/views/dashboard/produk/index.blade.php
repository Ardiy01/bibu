@extends('dashboard.layouts.main')

@section('content')
<div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
    <div class="container text-end">
        <a href="/dashboard/produk/create" class="btn sty-btn-edit"> 
            <span class="iconify" data-icon="akar-icons:plus" style="color: #007c84;"></span>
        </a>
    </div>
    @if ($produks->count())
    @foreach ($produks as $produk)
    <div class="container my-3">
        <div class="card shadow sty-card">
            <div class="card-header mb-0 pb-0 hd">
                <div class="d-flex justify-content-between mx-3">
                    <div class="my-auto">
                        <h6 class="fw-bold text-uppercase">{{ $produk->nama_produk }}</h6>
                    </div>
                    <div class="fw-bold">
                        <p class="mt-0 pt-0">Stok</p>
                        <p style="margin-top: -20px; margin-bottom: 0px;">{{ $produk->stok }}</p>
                    </div>
                </div>
            </div>
            <hr class="mt-0 mb-0" style="background-color: rgba(0, 124, 132, 0.2);">
            <div class="card-body mt-0">
                <div class="row">
                    <div class="col-sm-3 col-12">
                        <div class="text-center">
                            <img src="{{ asset('storage/' .$produk->gambar) }}" class="rounded m-auto" alt="{{ $produk->nama_produk }}" style="max-width: 12rem;">
                        </div>
                    </div>
                    <div class="col-sm-7 col-12 mt-2 mt-sm-0">
                        <div class="d-flex align-items-start flex-column bd-highlight" style="height: 100%;">
                            <div class="mb-auto px-2 pb-3 pb-sm-5 bd-highlight text-capitalize">{{ $produk->keterangan }}</div>
                            <div class="px-2 py-0 bd-highlight fw-bold">@currency($produk->harga)</div>
                                <div class="px-2 my-0 bd-highlight">
                                    <span class="iconify" data-icon="ant-design:star-filled" style="color: #007c84;"></span>
                                    {{ $produk->ulasan->avg('rating') }} | Terjual {{ $produk->pesanan->sum('jumlah_produk') }} Kg
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-12  text-end ">
                        {{-- button edit --}}
                            <div class="mb-sm-5 mx-3 mx-sm-0 d-inline d-sm-block">
                                <a href="/dashboard/produk/{{ $produk->id }}/edit" class="btn sty-btn-edit">
                                    <span class="iconify" data-icon="akar-icons:edit" style="color: #007c84; font-size: 1.2rem; "></span>
                                </a>
                            </div>
                            {{-- button lihat rating --}}
                            <div class="d-inline d-sm-block ">
                                <a href="/dashboard/produk/ulasan/{{ $produk->id }}" class="btn sty-btn-edit">
                                    <span class="iconify" data-icon="carbon:star-review" style="color: #007c84;"></span>
                                </a>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
        <h4 class="text-center m-auto">Belum ada Produk</h4>
    @endif
    <div class="d-flex justify-content-center my-3">
        {{ $produks->links() }}
    </div>
</div>
@endsection