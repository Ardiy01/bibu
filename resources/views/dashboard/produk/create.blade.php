@extends('dashboard.layouts.main')

@section('content')
    <div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
        <div class="container my-3">
            <div class="card shadow sty-card">
                <div class="card-header mb-0 pb-0 hd">
                    <div class="text-center py-2">
                        <h6 class="text-uppercase fw-bold">Tambah produk</h6>
                    </div>
                </div>
                <hr class="mt-0 mb-0" style="background-color: rgba(0, 124, 132, 0.2);">
                <div class="card-body mt-0 mx-sm-5 mx-1">
                    <form action="/dashboard/produk" method="post" id="create-produk" enctype="multipart/form-data">
                        @csrf
                        <x-input class="mb-3 fw-bold" id="namaProduk" label="Nama Produk" type="text" name="nama_produk" />
                        <div class="mb-3 fw-bold">
                            <label class="form-label col-sm-3 fs-6 col-12 m-auto" for="jenis">Jenis Produk</label>
                                <select class="form-select" id="jenis" name="id_jenis_produk">
                                    @foreach ($jenis_produks as $jenis)
                                        <option value="{{ old('id_jenis_produk', $jenis->id) }}">{{ $jenis->jenis_produk }}
                                        </option>
                                    @endforeach
                                </select>
                        </div>
                        <x-input class="mb-3 fw-bold" id="harga" label="Harga" type="number" name="harga" />
                        <x-input class="mb-3 fw-bold" id="stokProduk" label="Stok Produk (kg)" type="number"
                            name="stok" />
                        <x-input class="mb-3 fw-bold up-file" id="gambar" label="Gambar Produk" type="file" name="gambar" />

                        <div class="mb-3 fw-bold">
                            <label for="keterangan" class="form-label">Deskripsi Produk</label>
                            <div class="input-group">
                                <textarea class="form-control" id="keterangan" aria-label="With textarea"
                                    name="keterangan">{{ old('keterangan') }}</textarea>
                            </div>
                        </div>

                        {{-- button --}}
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn fw-bold text-light shadow-sm"
                                style="background-color: #004347">Simpan</button>
                            <a href="/dashboard/produk" class="btn px-2 fw-bold text-light shadow-sm"
                                style="background-color: #2DB5B2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
