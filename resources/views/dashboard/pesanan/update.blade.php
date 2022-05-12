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
                    <form action="/dashboard/pesanan/{{ $pesan->id }}" method="post" id="update-pesanan"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        @if ($pesan->user->rule != 'Pemilik')
                            <x-input-pesanan class="row mb-sm-3 mb-3" id="namaPemesan" label="Nama Pemesan" type="text"
                                name="nama" :value="$pesan->user->nama" :readonly=true />
                            <x-input-pesanan class="row mb-sm-3 mb-3" id="alamat" label="Alamat" type="text" name="alamat"
                                :value="$pesan->user->jalan .
                                    ' No. ' .
                                    $pesan->user->nomor .
                                    ' Kec. ' .
                                    $pesan->user->kecamatan->nama_kecamatan .
                                    ', Kab. ' .
                                    $pesan->user->kabupaten->nama_kabupaten" :readonly=true />
                        @endif

                        {{-- form customer --}}
                        @can('customer')
                            <div class="row mb-sm-3 mb-3">
                                <label class="form-label col-sm-3 fs-6 col-12 m-auto" for="produk">Nama Produk</label>
                                <div class="col-sm-9 col-12 mt-1">
                                    <select class="form-select" id="produk" name="id_produk" style="color: #007C84">
                                        @foreach ($produk as $prd)
                                            @if (old('id_produk', $pesan->id_produk) == $prd->id)
                                                <option value="{{ $prd->id }}" data-hargaproduk="{{ $prd->harga }}"
                                                    data-jenisproduk="{{ $prd->jenisproduk->jenis_produk }}"
                                                    style="color: #007C84" selected>{{ $prd->nama_produk }}</option>
                                            @else
                                                <option value="{{ $prd->id }}" data-hargaproduk="{{ $prd->harga }}"
                                                    data-jenisproduk="{{ $prd->jenisproduk->jenis_produk }}"
                                                    style="color: #007C84">{{ $prd->nama_produk }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <x-input-pesanan class="row mb-sm-3 mb-3" id="jumlahPesanan" label="Jumlah Pesanan" type="number"
                                name="jumlah_produk" :value="$pesan->jumlah_produk ?? ''" />

                            <div class="row mb-sm-3 mb-3">
                                <label class="form-label col-sm-3 fs-6 col-12 m-auto" for="pembayaran">Metode
                                    Pembayaran</label>
                                <div class="col-sm-9 col-12 mt-1">
                                    <select class="form-select" id="pembayaran" name="id_metode_pembayaran"
                                        style="color: #007C84">
                                        @foreach ($metode as $mtd)
                                            @if (old('id_status_pesanan', $pesan->id_metode_pembayaran) == $mtd->id)
                                                <option value="{{ $mtd->id }}"
                                                    data-pembayaran="{{ $mtd->metode_pembayaran }}" style="color: #007C84"
                                                    selected>
                                                    {{ $mtd->metode_pembayaran . ' (' . $mtd->no_rekening . ')' }}</option>
                                            @else
                                                <option value="{{ $mtd->id }}"
                                                    data-pembayaran="{{ $mtd->metode_pembayaran }}" style="color: #007C84">
                                                    {{ $mtd->metode_pembayaran . ' (' . $mtd->no_rekening . ')' }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <x-input-pesanan class="row mb-sm-3 mb-3" id="struk" label="Bukti Pembayaran" type="file"
                                name="bukti_pembayaran" />

                            <div class="row mb-sm-3 mb-3">
                                <label class="form-label col-sm-3 fs-6 col-12 m-auto" for="pengiriman">Jenis Pengiriman</label>
                                <div class="col-sm-9 col-12 mt-1" id="ekspedisi">
                                    <select class="form-select" id="pengiriman" name="id_pengiriman" style="color: #007C84">
                                        @foreach ($ekspedisi as $eks)
                                            @if (old('id_pengiriman', $pesan->id_pengiriman) == $eks->id)
                                                <option value="{{ $eks->id }}" data-eks="{{ $eks->id }}"
                                                    style="color: #007C84" selected>
                                                    {{ $eks->nama_pengiriman }}</option>
                                            @else
                                                <option value="{{ $eks->id }}" data-eks="{{ $eks->id }}"
                                                    style="color: #007C84">
                                                    {{ $eks->nama_pengiriman }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <x-input-pesanan class="row m-0" id="statusPesanan" type="hidden" name="id_status_pesanan"
                            :value="$pesan->id_status_pesanan" />

                            <x-input-pesanan class="row m-0" id="statuspembayaran" type="hidden" name="id_status_pembayaran"
                            :value="$pesan->id_status_pembayaran" />
                        @endcan






                        {{-- form pemilik --}}
                        @can('pemilik')
                        @if ($pesan->user->rule != 'Pemilik')
                            <x-input-pesanan class="row mb-3" id="produk" type="text" name="namaProduk" label="Nama Produk" :readonly=true
                        :value="$pesan->produk->nama_produk"/>
                            <x-input-pesanan class="row m-0" id="produk" type="hidden" name="id_produk"
                        :value="$pesan->id_produk"/>
                            <x-input-pesanan class="row mb-3" id="jumlahPesanan" label="Jumlah Pesanan" type="number" :readonly=true
                            name="jumlah_produk" :value="$pesan->jumlah_produk ?? ''" />
                        @else
                        <div class="row mb-sm-3 mb-3">
                            <label class="form-label col-sm-3 fs-6 col-12 m-auto" for="produk">Nama Produk</label>
                            <div class="col-sm-9 col-12 mt-1">
                                <select class="form-select" id="produk" name="id_produk" style="color: #007C84">
                                    @foreach ($produk as $prd)
                                        @if (old('id_produk', $pesan->id_produk) == $prd->id)
                                            <option value="{{ $prd->id }}" data-hargaproduk="{{ $prd->harga }}"
                                                data-jenisproduk="{{ $prd->jenisproduk->jenis_produk }}"
                                                style="color: #007C84" selected>{{ $prd->nama_produk }}</option>
                                        @else
                                            <option value="{{ $prd->id }}" data-hargaproduk="{{ $prd->harga }}"
                                                data-jenisproduk="{{ $prd->jenisproduk->jenis_produk }}"
                                                style="color: #007C84">{{ $prd->nama_produk }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <x-input-pesanan class="row mb-sm-3 mb-3" id="jumlahPesanan" label="Jumlah Pesanan" type="number"
                            name="jumlah_produk" :value="$pesan->jumlah_produk ?? ''" />
                        @endif

                        <x-input-pesanan class="row m-0" id="metodePembayaran" type="hidden"
                                name="id_metode_pembayaran" :readonly=true :value="$pesan->id_metode_pembayaran"/>
                        <x-input-pesanan class="row mb-sm-3 mb-3" id="metodePembayaran" label="Metode Pembayaran" type="text"
                                name="nama_pembayaran" :readonly=true :value="$pesan->metode_pembayaran->metode_pembayaran"/>
                        
                        
                        <x-input-pesanan class="row m-0" type="hidden"
                                name="id_pengiriman" :readonly=true :value="$pesan->id_pengiriman"/>
                        <x-input-pesanan class="row mb-sm-3 mb-3" id="ekspedisi" label="Jenis Pengiriman" type="text"
                                name="nama_pengiriman" :readonly=true :value="$pesan->pengiriman->nama_pengiriman"/>
                        

                        <div class="row mb-sm-3 mb-3">
                            <label class="form-label col-sm-3 fs-6 col-12 m-auto" for="statusPembayaran">Status
                                Pembayaran</label>
                            <div class="col-sm-9 col-12 mt-1">
                                <select class="form-select" id="statusPembayaran" name="id_status_pembayaran" style="color: #007C84">
                                    @foreach ($pembayaran as $pmb)
                                        @if (old('id_status_pembayaran', $pesan->id_status_pembayaran) == $pmb->id)
                                            <option value="{{ $pmb->id }}" style="color: #007C84" selected>{{ $pmb->status_pembayaran }} 
                                            </option>
                                        @else
                                            <option value="{{ $pmb->id }}" style="color: #007C84">{{ $pmb->status_pembayaran }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                            <div class="row mb-sm-3 mb-3">
                                <label class="form-label col-sm-3 fs-6 col-12 m-auto" for="statusPesanan">Status
                                    Pesanan</label>
                                <div class="col-sm-9 col-12 mt-1">
                                    <select class="form-select" id="statusPesanan" name="id_status_pesanan"
                                        style="color: #007C84">
                                        @foreach ($status as $sts)
                                            @if (old('id_status_pesanan', $pesan->id_status_pesanan) == $sts->id)
                                                <option value="{{ $sts->id }}" style="color: #007C84" selected>
                                                    {{ $sts->status_pesanan }}
                                                </option>
                                            @else
                                                <option value="{{ $sts->id }}" style="color: #007C84">
                                                    {{ $sts->status_pesanan }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            @if ($pesan->id_pengiriman != 1)
                                <x-input-pesanan class="row mb-sm-3 mb-3" id="nomorResi" label="Nomor Resi" type="text"
                                    name="no_resi" :value="$pesan->no_resi ?? ''" />

                                <x-input-pesanan class="row mb-sm-3 mb-3" id="ongkir" label="Ongkir" type="number" name="ongkir"
                                    :value="$pesan->ongkir ?? ''" />
                            @endif

                            @if ($pesan->user->rule == 'Pemilik' || $pesan->produk->jenisproduk->jenis_produk == 'Matang')
                                <div class="row mb-sm-3 mb-3">
                                    <label for="deskripsi" class="form-label col-sm-3 col-12 m-auto fs-6">Deskripsi</label>
                                    <div class="col-sm-9 col-12 mt-1">
                                        <div class="input-group">
                                            <textarea class="form-control" id="deskripsi" aria-label="With textarea" name="deskripsi"
                                                style="color: #007C84">{{ $pesan->deskripsi }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <x-input-pesanan class="row m-0" id="hargaproduk" type="hidden" name="harga_produk"
                            :value="$pesan->harga_produk" />
                        @endcan

                        <x-input-pesanan class="row m-0" id="hargaproduk" type="hidden" name="harga_produk"
                            :value="$pesan->harga_produk ?? ''" />

                        {{-- button --}}
                        <div class="col-12 text-sm-start text-center t-sm-3 my-2" id="btn-update"
                            style="margin-left: 11rem">
                            <button type="submit" class="btn text-light shadow-sm ms-sm-5 mx-2" id="simpan"
                                style="background-color: #004347">Simpan</button>
                            <a href="/dashboard/pesanan/{{ $pesan->id }}" class="btn px-4 text-light shadow-sm"
                                style="background-color: #2DB5B2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@can('customer')
<script>
    $(document).ready(function(){
        var harga_produk = $('#produk option:selected').data('hargaproduk');
        var jenis_produk = $('#produk option:selected').data('jenisproduk');
        $('#hargaproduk').val(harga_produk);
        var pembayaran = $('#pembayaran option:selected').data('pembayaran');
        if(pembayaran == "Tunai" || jenis_produk == "Matang"){
            $('#pembayaran').html('<select class="form-select" id="pembayaran" name="id_metode_pembayaran"><option value="{{ old('id_metode_pembayaran', 1) }}" data-pembayaran="Tunai" style="color: #007C84">Tunai</option></select>');
            $('#ekspedisi').html('<select class="form-select" id="pengiriman" name="id_pengiriman" style="color: #007C84"><option value="{{ old('id_pengiriman', 1) }}">Pick Up</option></select>');
        } else{
            $('#pembayaran').html('<select class="form-select" id="pembayaran" name="id_metode_pembayaran">@foreach ($metode as $pymb)<option value="{{ old('id_metode_pembayaran', $pymb->id) }}" data-pembayaran="{{ $pymb->metode_pembayaran }}" style="color: #007C84">{{ $pymb->metode_pembayaran . ' (' . $pymb->no_rekening . ')' }}</option>@endforeach</select>');
            $('#ekspedisi').html('<select class="form-select" id="pengiriman" name="id_pengiriman" style="color: #007C84">@foreach ($ekspedisi as $eks)<option value="{{ old('id_pengiriman', $eks->id) }}"data-eks="{{ $eks->id }}">{{ $eks->nama_pengiriman }}</option>@endforeach</select>');
        };
        $('#produk').change(function(){
                var jenis_produk = $('#produk option:selected').data('jenisproduk');
                var harga_produk = $('#produk option:selected').data('hargaproduk');
                var pembayaran = $('#pembayaran option:selected').data('pembayaran');
                $('#hargaproduk').val(harga_produk);
                if(jenis_produk == "Matang" || pembayaran != "Tunai"){
                    $('#pembayaran').html('<select class="form-select" id="pembayaran" name="id_metode_pembayaran"><option value="{{ old('id_metode_pembayaran', 1) }}" data-pembayaran="Tunai" style="color: #007C84">Tunai</option></select>');
                    $('#ekspedisi').html('<select class="form-select" id="pengiriman" name="id_pengiriman" style="color: #007C84"><option value="{{ old('id_pengiriman', 1) }}">Pick Up</option></select>');
                } else{
                    $('#pembayaran').html('<select class="form-select" id="pembayaran" name="id_metode_pembayaran">@foreach ($metode as $pymb)<option value="{{ old('id_metode_pembayaran', $pymb->id) }}" data-pembayaran="{{ $pymb->metode_pembayaran }}" style="color: #007C84">{{ $pymb->metode_pembayaran . ' (' . $pymb->no_rekening . ')' }}</option>@endforeach</select>');
                    $('#ekspedisi').html('<select class="form-select" id="pengiriman" name="id_pengiriman" style="color: #007C84">@foreach ($ekspedisi as $eks)<option value="{{ old('id_pengiriman', $eks->id) }}" data-eks="{{ $eks->id }}">{{ $eks->nama_pengiriman }}</option>@endforeach</select>');
                }; 
 
                if(pembayaran == "Tunai"){
                       $('#ekspedisi').html('<select class="form-select" id="pengiriman" name="id_pengiriman" style="color: #007C84"><option value="{{ old('id_pengiriman', 1) }}">Pick Up</option></select>');
                };
            });
        $('#pembayaran').change(function(){
            var pembayaran = $('#pembayaran option:selected').data('pembayaran');
            if(pembayaran == "Tunai"){
                $('#ekspedisi').html('<select class="form-select" id="pengiriman" name="id_pengiriman" style="color: #007C84"><option value="{{ old('id_pengiriman', 1) }}">Pick Up</option></select>');
            } else{
                $('#ekspedisi').html('<select class="form-select" id="pengiriman" name="id_pengiriman" style="color: #007C84">@foreach ($ekspedisi as $eks)<option value="{{ old('id_pengiriman', $eks->id) }}"data-eks="{{ $eks->id }}">{{ $eks->nama_pengiriman }}</option>@endforeach</select>');
            };
        });
    });
</script>
@endcan
@endpush
