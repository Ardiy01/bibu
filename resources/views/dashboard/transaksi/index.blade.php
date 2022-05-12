@extends('dashboard.layouts.main')

@section('content')
    <div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
        <div class="mx-4" style="color: #007c84">
            {{-- filter tanggal --}}
            <form action="/dashboard/transaksi" method="get">
                <div class="row mb-2 search" style="max-width: 24.5rem;">
                    <label for="start_date" class="form-label col-sm-5 col-12 m-auto">Pilih Rentang Tanggal:</label>
                    <div class="col-sm-7 col-12 mt-1 input-src-date" style="max-width: 15rem;">
                        <input type="date" class="form-control" style=" border-radius: 12px;" id="start_date"
                            name="start_date" value="{{ old('start_date') }}">
                    </div>
                </div>
                <div class="row mb-3 search" style="max-width: 24.5rem;">
                    <label for="end_date" class="form-label col-sm-5 col-12 m-auto">Pilih Rentang Tanggal:</label>
                    <div class="col-sm-7 col-12 mt-1" style="max-width: 15rem;">
                        <input type="date" class="form-control" style=" border-radius: 12px;" id="end_date"
                            name="end_date">
                    </div>
                </div>
                <div class="text-sm-start btn-src-date" style="margin-left: 10rem;">
                    <button class="btn mb-2 text-light px-4" type="submit" id="search"
                        style="background-color: #007C84;  border-radius: 10px">Cari</button>
                </div>
            </form>
        </div>

        {{-- button created --}}
        <div class="container text-end">
            <a href="/dashboard/transaksi/create" class="btn sty-btn-edit" style="margin-top: -70px">
                <span class="iconify" data-icon="akar-icons:plus" style="color: #007c84;"></span>
            </a>
            @if ($transaksi->count())
                @foreach ($transaksi as $trs)
                    <a href="/dashboard/transaksi/{{ $trs->id }}" style="text-decoration: none">
                        @if ($trs->jenis_transaksi->kategori != 'Pemasukan')
                            <div class="sty-card mb-4 card-melihat shadow zoom">
                        @else
                            <div class="sty-card mb-4 card-off shadow zoom">
                        @endif
                        <div class="card-header mb-0 pb-0 hd">
                            <div class="row  mx-0 mb-0 pb-0">
                                <div class="col-sm-6 col-7 my-auto fw-bold text-uppercase row" style="color: #007C84;">
                                    <h6 class="fw-bold mb-0 text-start">
                                        {{ $trs->jenis_transaksi->kategori }}
                                    </h6>
                                    <p class="my-0 fw-normal px-sm-4 text-start">
                                        {{ $trs->updated_at->isoFormat('DD/MM/Y') }}
                                    </p>
                                </div>
                                <div class="col-sm-6 col-5 text-end my-auto ">
                                    <h6 class="py-auto fw-bold">
                                        @currency($trs->nominal)
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-0 mb-0" style="background-color: rgba(0, 124, 132, 0.2);">
                        <div class="card-body mt-0 mx-3">
                            <div class="row">
                                <h6 class="text-capitalize text-start">
                                    {{ $trs->keterangan }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </a>
        @endforeach
    @else
        <h4 class="text-center text-center my-4" style="color: #007c84">Belum ada Transaksi</h4>
        @endif
        <div class="d-flex justify-content-center my-3">
            {{ $transaksi->links() }}
        </div>
    </div>
    </div>
@endsection
