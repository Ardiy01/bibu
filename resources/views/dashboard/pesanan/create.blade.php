@extends('dashboard.layouts.main')

@section('content')
    <div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
        <div class="container my-3">
            <div class="card shadow sty-card">
                <div class="card-header mb-0 pb-0 hd">
                    <div class="text-center py-2">
                        <h6 class="text-uppercase fw-bold">Tambah Pesanan</h6>
                    </div>
                </div>
                <hr class="mt-0 mb-0" style="background-color: rgba(0, 124, 132, 0.2);">
                <div class="card-body mt-0 mx-sm-5 mx-1">
                    <form action="/dashboard/pesanan" method="post" id="create-pesanan" enctype="multipart/form-data">
                        @csrf
                        @foreach ($users as $user)
                            <input type="hidden" name="id_user" value="{{ $user->id }}">
                            @if ($user->rule == 'Customer')
                                <x-input-pesanan class="row mb-sm-3 mb-3" id="namaPemesan" label="Nama Pemesan" type="text"
                                    name="nama" :value="$user->nama" :readonly=true />
                                <x-input-pesanan class="row mb-sm-3 mb-3" id="alamat" label="Alamat" type="text"
                                    name="alamat" :value="$user->jalan .
                                        ' No. ' .
                                        $user->nomor .
                                        ' Kec. ' .
                                        $user->kecamatan->nama_kecamatan .
                                        ', ' .
                                        $user->kabupaten->nama_kabupaten" :readonly=true />
                            @endif

                            <div class="row mb-sm-3 mb-3">
                                <label class="form-label col-sm-3 fs-6 col-12 m-auto" for="produk">Nama Produk</label>
                                <div class="col-sm-9 col-12 mt-1">
                                    <select class="form-select" id="produk" name="id_produk" style="color: #007C84">
                                        @foreach ($produk as $prd)
                                            <option class="text-capitalize" value="{{ old('id_produk', $prd->id) }}" data-hargaproduk="{{ $prd->harga }}" data-jenisproduk="{{ $prd->jenisproduk->jenis_produk }}" style="color: #007C84">{{ $prd->nama_produk }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <x-input-pesanan class="row mb-sm-3 mb-3" id="jumlahPesanan" label="Jumlah Pesanan"
                                type="number" name="jumlah_produk" />
                        @endforeach

                        <div class="row mb-sm-3 mb-3">
                            <label class="form-label col-sm-3 fs-6 col-12 m-auto" for="pembayaran">Metode
                                Pembayaran</label>
                            <div class="col-sm-9 col-12 mt-1">
                                <select class="form-select" id="pembayaran" name="id_metode_pembayaran" style="color: #007C84">
                                    @foreach ($metode as $mtd)
                                        <option value="{{ old('id_metode_pembayaran', $mtd->id) }}" data-pembayaran="{{ $mtd->metode_pembayaran }}" style="color: #007C84">
                                            {{ $mtd->metode_pembayaran . ' (' . $mtd->no_rekening . ')' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @foreach ($users as $user)
                            @if ($user->rule == 'Customer')
                                <x-input-pesanan class="row mb-sm-3 mb-3 bukti-transfer" id="struk" label="Bukti Pembayaran" type="file"
                                    name="bukti_pembayaran" />
                            @endif
                        @endforeach

                        <div class="row mb-sm-3 mb-3">
                            <label class="form-label col-sm-3 fs-6 col-12 m-auto" for="pengiriman">Jenis Pengiriman</label>
                            <div class="col-sm-9 col-12 mt-1" id="ekspedisi">
                                <select class="form-select" id="pengiriman" name="id_pengiriman" style="color: #007C84">
                                    @foreach ($ekspedisi as $eks)
                                    <option value="{{ old('id_pengiriman', $eks->id) }}" data-ekspedisi="{{ $eks->id }}" style="color: #007C84">
                                        {{ $eks->nama_pengiriman }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @foreach ($users as $user)
                            @if ($user->rule == 'Pemilik')
                                <div class="row mb-sm-3 mb-3">
                                    <label for="deskripsi" class="form-label col-sm-3 col-12 m-auto fs-6">Deskripsi</label>
                                    <div class="col-sm-9 col-12 mt-1">
                                        <div class="input-group">
                                            <textarea class="form-control" id="deskripsi" aria-label="With textarea"
                                                name="deskripsi" style="color: #007C84">{{ old('deskripsi') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <input type="hidden" id="hargaproduk" name="harga_produk">
                        @endforeach


                        {{-- button --}}
                        <div class="col-12 text-sm-start text-center mt-0 mb-2" id="btn-update"
                            style="margin-left: 11rem">
                            <button type="submit" class="btn text-light shadow-sm ms-sm-5 mx-2" id="simpan"
                                style="background-color: #004347">Simpan</button>
                            <a href="/dashboard/pesanan" class="btn px-4 text-light shadow-sm"
                                style="background-color: #2DB5B2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
@endsection
@push('script')
<script>
    $(document).ready(function(){
        var harga_produk = $('#produk option:selected').data('hargaproduk');
        $('#hargaproduk').val(harga_produk);
        var pembayaran = $('#pembayaran option:selected').data('pembayaran');
        if(pembayaran == "Tunai"){
            $('#ekspedisi').html('<select class="form-select" id="pengiriman" name="id_pengiriman" style="color: #007C84"><option value="{{ old('id_pengiriman', 1) }}">Pick Up</option></select>');
            $('.bukti-transfer').addClass('d-none');
        } else{
            $('#ekspedisi').html('<select class="form-select" id="pengiriman" name="id_pengiriman" style="color: #007C84">@foreach ($ekspedisi as $eks)<option value="{{ old('id_pengiriman', $eks->id) }}"data-eks="{{ $eks->id }}">{{ $eks->nama_pengiriman }}</option>@endforeach</select>');
            $('.bukti-transfer').removeClass('d-none');
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
                    $('.bukti-transfer').addClass('d-none');
                };
            });
        $('#pembayaran').change(function(){
            var pembayaran = $('#pembayaran option:selected').data('pembayaran');
            if(pembayaran == "Tunai"){
                $('#ekspedisi').html('<select class="form-select" id="pengiriman" name="id_pengiriman" style="color: #007C84"><option value="{{ old('id_pengiriman', 1) }}">Pick Up</option></select>');
                $('.bukti-transfer').addClass('d-none');
            } else{
                $('#ekspedisi').html('<select class="form-select" id="pengiriman" name="id_pengiriman" style="color: #007C84">@foreach ($ekspedisi as $eks)<option value="{{ old('id_pengiriman', $eks->id) }}"data-eks="{{ $eks->id }}">{{ $eks->nama_pengiriman }}</option>@endforeach</select>');
                $('.bukti-transfer').removeClass('d-none');
            };
        });
    });
</script>
@endpush
