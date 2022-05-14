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
                                <p class="mt-0 px-2 pt-0" style="color:#007C84;">Gambar Maksimal Berukuran 2MB</p>
                            </div>
                        </div>

                        {{-- data profil --}}
                        <div class="d-grid gap-0 col-12 mx-auto mt-3">
                            <x-detail id="nama" label="Nama Lengkap" name="nama" type="text" :value="$usr->nama ?? ''" />
                            
                            <div class="d-grid gap-2 col-12 mx-auto">
                                <div class="my-2" style="color: #007C84">
                                    <label class="form-label mb-1 fw-bold" for="jenis_kelamin">Jenis Kelamin</label>
                                    <div class="input-group mt-0">
                                        <select class="form-select bg-white fw-bold shadow" id="jenis_kelamin"
                                                name="jenis_kelamin" style="color: #007C84">
                                            <option value="{{ $usr->jenis_kelamin }}" style="color: #007C84" selected> {{ $usr->jenis_kelamin }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <x-detail id="username" label="Username" name="username" type="text" :value="$usr->username ?? ''" />

                            <div class="row">
                                <div class="col-3">
                                    <x-detail id="jalan" label="Jalan" name="jalan" type="text" :value="$usr->jalan ?? ''" />
                                </div>
                                <div class="col-1">
                                    <x-detail id="nomor" label="Nomor" name="nomor" type="text" :value="$usr->nomor ?? ''" />
                                </div>
                                <div class="col-4">
                                    <div class="d-grid gap-2 col-12 mx-auto">
                                        <div class="my-2" style="color: #007C84">
                                            <label class="form-label mb-1 fw-bold" for="kabupaten">Kabupaten</label>
                                            <div class="input-group mt-0">
                                                <select class="form-select bg-white fw-bold shadow" id="kabupaten"
                                                    name="id_kabupaten" style="color: #007C84">
                                                    @foreach ($kabupaten as $kbp)
                                                        @if (old('id_kabupaten', $usr->id_kabupaten) == $kbp->id)
                                                            <option value="{{ $kbp->id }}" style="color: #007C84"
                                                                selected>
                                                                {{ $kbp->nama_kabupaten }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $kbp->id }}" style="color: #007C84">
                                                                {{ $kbp->nama_kabupaten }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="d-grid gap-2 col-12 mx-auto">
                                        <div class="my-2" style="color: #007C84">
                                            <label class="form-label mb-1 fw-bold" for="kecamatan">Kecamatan</label>
                                            <div class="input-group mt-0">
                                                <select class="form-select bg-white fw-bold shadow" id="kecamatan"
                                                    name="id_kecamatan" style="color: #007C84">
                                                        <option value="{{ $usr->id_kecamatan }}" style="color: #007C84"
                                                                selected>
                                                            {{ $usr->kecamatan->nama_kecamatan }}
                                                        </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <x-detail id="nomer_telepon" label="Nomor Hp" name="nomer_telepon" type="text"
                                :value="$usr->nomer_telepon ?? ''" />

                            <x-detail id="email" label="Email" name="email" type="email" :value="$usr->email ?? ''" />

                            <label for="password" class="form-label fw-bold mt-2" style="color:#007C84">Password</label>
                            <div class="input-group mb-3">
                                <input name="password" type="password" class="form-control shadow fw-bold" id="password"  style="color:#007C84">
                                <button class="btn shadwo" type="button" id="show" style="background-color:#007C84">
                                    <span id="icons" class="iconify" data-icon="pepicons:eye" style="color: white; font-size: 20px"></span>
                                </button>
                            </div>
                            <x-input class="my-0" type="hidden" id="id_us" :value="$usr->id"/>

                        </div>

                        {{-- button --}}
                        <div class="col-12 text-sm-start text-center mt-0 mb-2" id="btn-update">
                            <button type="submit" id="simpan" class="btn text-light shadow-sm me-3"
                                style="background-color: #004347">Simpan</button>
                            <a href="/dashboard/profil" class="btn px-4 text-light shadow-sm"
                                style="background-color: #2DB5B2">Batal</a>
                        </div>
                    </form>
                </div>
        </div>
        @endforeach

    </div>
    </div>
@endsection

@push('script')
<script src="{{ asset('assets/js/profil.js') }}"></script>
<script src="{{ asset('assets/js/showPass.js') }}"></script>
@endpush