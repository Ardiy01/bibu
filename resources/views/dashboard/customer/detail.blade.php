@extends('dashboard.layouts.main')

@section('content')
    <div class="container py-2 mt-4 shadow mb-5" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
        <div class="container py-3">
            <div class="col-8 my-auto fw-bold text-uppercase fs-6" style="color: #007C84;">
                <a href="/dashboard/customer" class="mx-1 text-center" style="text-decoration: none">
                    <span class="iconify fw-bold" data-icon="ooui:next-rtl" style="color: #007c84;"></span>
                </a>
                Profil Customer
            </div>
            @foreach ($user as $usr)
                <div class="d-sm-flex justify-content-center my-3">
                    {{-- foto profil --}}
                    <div class="col-sm-2 col-12 text-sm-end text-center profil-img">
                        <img src="{{ asset('storage/' . $usr->profil) }}" alt="{{ $usr->nama }}" class="sty-profil">
                    </div>
                    {{-- nama --}}
                    <div class="col-sm-2 col-12 text-center my-sm-auto my-2">
                        <h5 class="fw-bold text-capitalize" style="color: #007C84">{{ $usr->nama }}</h5>
                    </div>
                </div>

                {{-- data --}}
                <div class="d-grid gap-1 col-12 mx-auto">
                    <x-detail id="nama" label="Nama Lengkap" type="text" :value="$usr->nama" :readonly=true />
                    <x-detail id="username" label="Username" type="text" :value="$usr->username" :readonly=true />
                    <x-detail id="alamat" type="text" label="Alamat" :value="$usr->jalan .
                        ' No. ' .
                        $usr->nomor .
                        ' Kec. ' .
                        $usr->kecamatan->nama_kecamatan .
                        ', ' .
                        $usr->kabupaten->nama_kabupaten" :readonly=true />
                    <x-detail id="nohp" type="text" label="Nomor Hp" :value="$usr->nomer_telepon" :readonly=true />
                    <x-detail id="email" type="email" label="Email" :value="$usr->email" :readonly=true />
                </div>
            @endforeach
        </div>
    </div>
@endsection
