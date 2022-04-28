@extends('dashboard.layouts.main')

@section('content')
    <div class="container py-2 mt-4 shadow mb-4" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
       <div class="container py-3">
           @foreach ($user as $usr)
            <div class="d-sm-flex justify-content-center my-3">
                {{-- foto profil --}}
                <div class="col-sm-2 col-12 text-sm-end text-center profil-img">
                    <img src="{{ asset('storage/' . $usr->profil) }}" alt="{{ $usr->nama }}" class="sty-profil">
                </div>
                {{-- nama --}}
                <div class="col-sm-2 col-12 text-center my-sm-auto my-2">
                    <h5 class="fw-bold" style="color: #007C84">{{ $usr->nama }}</h5>
                    <div class="py-1">
                        <a href="/dashboard/profil/{{ $usr->id }}/edit" class="btn btn-sm text-white fw-bold px-3" style="background-color: #007C84">Edit Profil</a>
                    </div>
                </div>
            </div>

            {{-- data --}}
            <div class="d-grid gap-1 col-12 mx-auto">
                    <x-detail  
                        id="nama"
                        label="Nama Lengkap"
                        type="text"
                        :value="$usr->nama"
                        :readonly=true
                    />
                    <x-detail  
                        id="username"
                        label="Username"
                        type="text"
                        :value="$usr->username"
                        :readonly=true
                    />
                    <x-detail  
                        id="alamat"
                        type="text"
                        label="Alamat"
                        :value="$usr->jalan .
                        ' No. ' .
                        $usr->nomor .
                        ' Kec. ' .
                        $usr->kecamatan->nama_kecamatan .
                        ', Kab. ' .
                        $usr->kabupaten->nama_kabupaten"
                        :readonly=true
                    />
                    <x-detail  
                        id="nohp"
                        type="text"
                        label="Nomor Hp"
                        :value="$usr->nomer_telepon"
                        :readonly=true
                    />
                    <x-detail  
                        id="email"
                        type="email"
                        label="Email"
                        :value="$usr->email"
                        :readonly=true
                    />
                    <x-detail  
                        id="pass"
                        type="password"
                        label="Password"
                        :value="$usr->username"
                        :readonly=true
                    />
            </div>
           @endforeach
       </div>
    </div>
@endsection
