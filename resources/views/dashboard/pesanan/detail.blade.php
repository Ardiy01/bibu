@extends('dashboard.layouts.main')

@section('content')
    <h4 class="text-center mt-3 bg-primary py-2 text-light rounded-3">Detail Pesanan</h4>

    <div class="container d-flex justify-content-center my-3">
        <div class="card shadow-lg my-2" style="width: 45rem;">
            <h5 class="my-3 text-center">Detail Pesanan</h5>
            <div class="card-body">
                <div class="row g-3">
                    {{-- nama pembeli --}}
                    <x-input class="col-12 px-4"
                    id="namaPembeli"
                    label="Nama Pembeli"
                    type="text"
                    name="nama_pembeli"
                    :value="$pesanan->user->nama"
                    :readonly="true"
                    />

                    {{-- no hp --}}
                    <x-input class="col-12 px-4"
                    id="nomoTelepon"
                    label="Nomor Telepon"
                    type="text"
                    name="nomer_telepon"
                    :value="$pesanan->user->nomer_telepon"
                    :readonly="true"
                    />

                    {{-- alamat --}}
                    <div class="col-12 px-4">
                        <label for="alamat" class="form-label">Alamat Pembeli</label>
                        <div class="input-group">
                          <textarea class="form-control" id="alamat" aria-label="With textarea" name="alamat" readonly>{{ $pesanan->user->jalan. 'No. ' .$pesanan->user->nomor. ' Kecamatan ' . $pesanan->user->kecamatan->nama_kecamatan . ' Kabupaten ' . $pesanan->user->kabupaten->nama_kabupaten }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection