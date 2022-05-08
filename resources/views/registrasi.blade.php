<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shotcut icon" href="{{ asset('assets/img/Logo.png') }}">
    <title>BIBU</title>
</head>

<body style="background-color: #f5fafa">
    @include('sweetalert::alert')
    <div class="container my-3">
        {{-- navbar --}}
        <div class="py-3 shadow-sm rounded-3 container text-end" style="background-color: #EAF3F4">
            <h6 class="my-auto fw-bold text-uppercase" style="color: #007C84">
                Pendaftaran
            </h6>
        </div>
        {{-- pendaftaran --}}
        <div class="container my-3 py-3 shadow" style="background-color: #EAF3F4">
            {{-- logo --}}
            <div class="container">
                <div class="row">
                    <div class="col-6 text-end">
                        <img src="{{ asset('assets/img/Logo.png') }}" alt="logo-bibu">
                    </div>
                    <div class="col-6">
                        <h2 class="d-inline my-auto" style="color: #007C84;">BiBU</h2>
                    </div>
                </div>
            </div>
            <div class="container px-5">
                <form action="/registrasi" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- data profil --}}
                    <div class="d-grid gap-0 col-12 mx-auto mt-3">
                        <x-detail id="nama" label="Nama Lengkap" name="nama" type="text" />

                        <x-detail id="username" label="Username" name="username" type="text" />

                        <div class="d-grid gap-2 col-12 mx-auto">
                            <div class="my-2" style="color: #007C84">
                                <label class="form-label mb-1 fw-bold" for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="input-group mt-0">
                                    <select class="form-select bg-white fw-bold shadow" id="jenis_kelamin"
                                        name="jenis_kelamin" style="color: #007C84">
                                        <option value="Laki - Laki"
                                            style="color: #007C84" selected> laki - Laki
                                        </option>
                                        <option value="Perempuan"
                                            style="color: #007C84"> Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <x-detail id="jalan" label="Jalan" name="jalan" type="text" />
                            </div>
                            <div class="col-1">
                                <x-detail id="nomor" label="Nomor" name="nomor" type="text" />
                            </div>
                            <div class="col-4">
                                <div class="d-grid gap-2 col-12 mx-auto">
                                    <div class="my-2" style="color: #007C84">
                                        <label class="form-label mb-1 fw-bold" for="kabupaten">Kabupaten</label>
                                        <div class="input-group mt-0">
                                            <select class="form-select bg-white fw-bold shadow" id="kabupaten"
                                                name="id_kabupaten" style="color: #007C84">
                                                @foreach ($kabupaten as $kbp)
                                                    <option value="{{ old('id_kabupaten', $kbp->id) }}"
                                                        style="color: #007C84" selected>
                                                        {{ $kbp->nama_kabupaten }}
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
                                                @foreach ($kecamatan as $kcmt)
                                                    <option value="{{ old('id_kecamatan', $kcmt->id) }}"
                                                        style="color: #007C84" selected>
                                                        {{ $kcmt->nama_kecamatan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <x-detail id="nomer_telepon" label="Nomor Telepon" name="nomer_telepon" type="text" />

                        <x-detail id="email" label="Email" name="email" type="email" />

                        <x-detail id="password" label="Password" name="password" type="password" />
                    </div>

                    {{-- button --}}
                    <div class="col-12 text-sm-start text-center my-2" id="btn-update">
                        <button type="submit" class="btn text-light shadow-sm me-3 px-5"
                            style="background-color: #004347">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- script js --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
