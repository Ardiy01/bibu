@extends('dashboard.layouts.main')

@section('content')
    <div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
        <div class="container my-3">
            <div class="card shadow sty-card">
                <div class="card-header mb-0 pb-0 hd">
                    <div class="text-center py-2">
                        <h6 class="text-uppercase fw-bold">Edit Transaksi</h6>
                    </div>
                </div>
                <hr class="mt-0 mb-0" style="background-color: rgba(0, 124, 132, 0.2);">
                <div class="card-body mt-0 mx-sm-5 mx-1">
                    <form action="/dashboard/transaksi/{{ $pengeluaran->id }}" method="post">
                        @method('put')
                        @csrf
                        <x-input-pesanan class="row mb-sm-3 mb-3" id="nominal" label="Nominal" type="number" name="nominal" :value="$pengeluaran->pengeluaran->nominal" />

                        <div class="row mb-sm-3 mb-3">
                            <label for="keterangan" class="form-label col-sm-3 col-12 m-auto fs-6">Keterangan</label>
                            <div class="col-sm-9 col-12 mt-1">
                                <div class="input-group">
                                    <textarea class="form-control text-capitalize @error('keterangan') is-invalid @enderror" id="keterangan" aria-label="With textarea"
                                        name="keterangan" style="color: #004347">{{ $pengeluaran->keterangan }}</textarea>
                                        @error('keterangan')
                                        <div class="invalid-feedback text-capitalize">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- button --}}
                        <div class="col-12 text-sm-start text-center t-sm-3 my-2" id="btn-update"
                            style="margin-left: 11rem">
                            <button type="submit" id="simpan" class="btn text-light shadow-sm ms-sm-5 mx-2"
                                style="background-color: #004347">Simpan</button>
                            <a href="/dashboard/transaksi" class="btn px-4 text-light shadow-sm"
                                style="background-color: #2DB5B2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
