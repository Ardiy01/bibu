@extends('dashboard.layouts.main')

@section('content')
    <div class="container py-2 mt-4 shadow mb-4" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
        <div class="container my-3">
            <div class="col-8 my-auto fw-bold text-uppercase" style="color: #007C84;">
                <a href="/dashboard/profil" class="mx-1 text-center" style="text-decoration: none">
                    <span class="iconify fw-bold" data-icon="ooui:next-rtl" style="color: #007c84;"></span>
                </a>
                Edit Profil
            </div>
            @foreach ($user as $usr)
                <div class="mt-4 ">
                    <form action="/dashboard/profil/{{ $usr->id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        {{-- profil --}}
                        <div class="row">
                            <div class="col-4 col-sm-2 text-sm-end text-center profil-img">
                                <img src="{{ asset('storage/' . $usr->profil) }}" alt="{{ $usr->nama }}"
                                    class="sty-profil-update">
                            </div>
                            <div class="col-sm-4 col-8 my-auto">
                                <div class="fileUpload btn py-1">
                                    <span>Upload Foto Baru</span>
                                    <input type="file" id="profil" class="upload" name="profil">
                                </div>
                            </div>
                        </div>

                        {{-- data profil --}}
                        <div class="d-grid gap-0 col-12 mx-auto mt-3">
                            <x-detail id="nama" label="Nama Lengkap" name="nama" type="text" :value="$usr->nama ?? ''" />

                            <x-detail id="username" label="Username" name="username" type="text" :value="$usr->username ?? ''" />

                            <x-detail id="nomer_telepon" label="Nomor Telepon" name="nomer_telepon" type="text"
                                :value="$usr->nomer_telepon ?? ''" />

                            <x-detail id="email" label="Email" name="email" type="email" :value="$usr->email ?? ''" />

                            <x-detail id="password" label="Password" name="password" type="password" />
                        </div>

                        {{-- button --}}
                        <div class="col-12 text-sm-start text-center my-2" id="btn-update">
                            <button type="submit" class="btn text-light shadow-sm me-3"
                                style="background-color: #004347">Simpan</button>
                            <a href="/dashboard/profil" class="btn px-4 text-light shadow-sm"
                                style="background-color: #2DB5B2">Batal</a>
                        </div>
                </div>
                </form>
        </div>
        @endforeach

    </div>
    </div>
@endsection
