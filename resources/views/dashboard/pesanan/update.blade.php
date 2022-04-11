@extends('dashboard.layouts.main')

@section('content')
<div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
    <div class="container my-3">
        <div class="card shadow sty-card">
            <div class="card-header mb-0 pb-0 hd">
                <div class="text-center py-2">
                    <h6 class="text-uppercase fw-bold">Update Pesanan</h6>
                </div>
            </div>
            <hr class="mt-0 mb-0" style="background-color: rgba(0, 124, 132, 0.2);">
            <div class="card-body mt-0 mx-sm-5 mx-1">
                <form action="/dashboard/pesanan/{{ $pesan->id }}" method="post" id="update-pesanan" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    @if ($pesan->user->rule != 'Pemilik')
                        <x-input-pesanan class="row mb-sm-3 mb-3"
                            id="namaPemesan"
                            label="Nama Pemesan"
                            type="text"
                            name="nama"
                            :value="$pesan->user->nama"
                            :readonly=true
                        />    
                        <x-input-pesanan class="row mb-sm-3 mb-3"
                            id="alamat"
                            label="Alamat"
                            type="text"
                            name="alamat"
                            :value="$pesan->user->jalan . ' No. ' . $pesan->user->nomor . ' Kec. ' . $pesan->user->kecamatan->nama_kecamatan .', Kab. '. $pesan->user->kabupaten->nama_kabupaten"
                            :readonly=true
                        />
                    @endif

                    <div class="row mb-sm-3 mb-3">
                        <label class="form-label col-sm-3 fs-6 col-12 m-auto" for="produk">Nama Produk</label>
                        <div class="col-sm-9 col-12 mt-1">
                            <select class="form-select" id="produk" name="id_produk">
                                @foreach ($produk as $prd)
                                    @if (old('id_produk', $pesan->id_produk) == $prd->id)  
                                        <option value="{{ $prd->id }}" selected>{{ $prd->nama_produk }}</option>
                                        @else
                                        <option value="{{ $prd->id }}">{{ $prd->nama_produk }}</option>   
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <x-input-pesanan class="row mb-sm-3 mb-3"
                        id="jumlahPesanan"
                        label="Jumlah Pesanan"
                        type="number"
                        name="jumlah_produk"
                        :value="$pesan->jumlah_produk ?? ''"
                    />

                    <div class="row mb-sm-3 mb-3">
                        <label class="form-label col-sm-3 fs-6 col-12 m-auto" for="statusPembayaran">Status Pembayaran</label>
                        <div class="col-sm-9 col-12 mt-1">
                            <select class="form-select" id="statusPembayaran" name="id_status_pembayaran">
                                @foreach ($pembayaran as $pmb)
                                    @if (old('id_status_pembayaran', $pesan->id_status_pembayaran) == $pmb->id)  
                                        <option value="{{ $pmb->id }}" selected>{{ $pmb->status_pembayaran }}</option>
                                        @else
                                        <option value="{{ $pmb->id }}">{{ $pmb->status_pembayaran }}</option>   
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-sm-3 mb-3">
                        <label class="form-label col-sm-3 fs-6 col-12 m-auto" for="statusPembayaran">Status Pesanan</label>
                        <div class="col-sm-9 col-12 mt-1">
                            <select class="form-select" id="statusPembayaran" name="id_status_pesanan">
                                @foreach ($status as $sts)
                                    @if (old('id_status_pesanan', $pesan->id_status_pesanan) == $sts->id)  
                                        <option value="{{ $sts->id }}" selected>{{ $sts->status_pesanan }}</option>
                                        @else
                                        <option value="{{ $sts->id }}">{{ $sts->status_pesanan }}</option>   
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-sm-3 mb-3">
                        <label class="form-label col-sm-3 fs-6 col-12 m-auto" for="statusPesanan">Metode Pembayaran</label>
                        <div class="col-sm-9 col-12 mt-1">
                            <select class="form-select" id="statusPesanan" name="id_metode_pembayaran">
                                @foreach ($metode as $mtd)
                                    @if (old('id_status_pesanan', $pesan->id_metode_pembayaran) == $mtd->id)  
                                        <option value="{{ $mtd->id }}" selected>{{ $mtd->metode_pembayaran . ' (' . $mtd->no_rekening . ')' }}</option>
                                        @else
                                        <option value="{{ $mtd->id }}">{{ $mtd->metode_pembayaran . ' (' . $mtd->no_rekening . ')'}}</option>   
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @if ($pesan->id_metode_pembayaran != 1)  
                        <x-input-pesanan class="row mb-sm-3 mb-3"
                            id="struk"
                            label="Bukti Pembayaran"
                            type="file"
                            name="bukti_pembayaran"
                        />
                    @endif

                    <div class="row mb-sm-3 mb-3">
                        <label class="form-label col-sm-3 fs-6 col-12 m-auto" for="pengiriman">Jenis Pengiriman</label>
                        <div class="col-sm-9 col-12 mt-1">
                            <select class="form-select" id="pengiriman" name="id_pengiriman">
                                @foreach ($ekspedisi as $eks)
                                    @if (old('id_pengiriman', $pesan->id_pengiriman) == $eks->id)  
                                        <option value="{{ $eks->id }}" data-eks="{{ $eks->id }}" selected>{{ $eks->nama_pengiriman }}</option>
                                        @else
                                        <option value="{{ $eks->id }}" data-eks="{{ $eks->id }}">{{ $eks->nama_pengiriman }}</option>   
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @if ($pesan->id_pengiriman != 1)
                        <x-input-pesanan class="row mb-sm-3 mb-3"
                            id="nomorResi"
                            label="Nomor Resi"
                            type="text"
                            name="no_resi"
                            :value="$pesan->no_resi ?? ''"
                        />

                        <x-input-pesanan class="row mb-sm-3 mb-3"
                            id="ongkir"
                            label="Ongkir"
                            type="number"
                            name="onkir"
                            :value="$pesan->ongkir ?? ''"
                        />   
                    @endif

                    @if ($pesan->user->rule == 'Pemilik')
                        
                    @endif

                    {{-- button --}}
                    <div class="col-12 text-sm-start text-center t-sm-3 my-2" id="btn-update" style="margin-left: 11rem">
                        <button type="submit" class="btn text-light shadow-sm ms-sm-5 mx-2" style="background-color: #004347">Simpan</button>
                        <a href="/dashboard/pesanan/{{ $pesan->id }}" class="btn px-4 text-light shadow-sm" style="background-color: #2DB5B2">Batal</a>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection