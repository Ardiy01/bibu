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
                                            <div class="input-group mt-0" id="kecamatan">
                                                <select class="form-select bg-white fw-bold shadow" id="kecamatan"
                                                    name="id_kecamatan" style="color: #007C84">
                                                    @foreach ($kecamatan as $kcmt)
                                                        @if (old('id_kecamatan', $usr->id_kecamatan) == $kcmt->id)
                                                            <option value="{{ $kcmt->id }}" style="color: #007C84"
                                                                selected>
                                                                {{ $kcmt->nama_kecamatan }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $kcmt->id }}" style="color: #007C84">
                                                                {{ $kcmt->nama_kecamatan }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    </form>
                </div>
        </div>
        @endforeach

    </div>
    </div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('#kabupaten').on('change', function() {
            var value = $('#kabupaten').val();
            var kcmtan = document.getElementById('#kecamatan');
            $.ajax({
                type: "get",
                url: "/dashboard/profil/{{ $usr->id }}/edit",
                data: {value: value},
                dataType: "json",
                success: function(data) {
                    var kcmt = data.kecamatan;

                    $.each(kcmt, function(index, obj){
                        $('#kecamatan').append('<option value="' + obj.id + '">' + obj.nama_kecamatan + '</option>');
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                }
            });
        });
    });
</script>
@endpush