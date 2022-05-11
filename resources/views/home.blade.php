<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>BiBU</title>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</head>

<body style="background-color: #F5FAFA;">

    <!-- header -->
    <div class="container my-3 py-2 shadow rounded-3" style="background-color: #EAF3F4; color: #007C84;">
        <h5 class="text-end fw-bold my-auto px-3">BiBU</h5>
    </div>

    <div class="container shadow mt-4 mb-5 rounded-3 px-2 py-2" style="background-color: #EAF3F4; color:#007C84;">
        <div class="container pt-3">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-2 text-end">
                            <img src="{{ asset('assets/img/Logo.png') }}" alt="logoBibu">
                        </div>
                        <div class="col-9 my-auto text-start">
                            <h5 class="my-auto py-auto">BiBU</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                        <a class="btn fs-5 fw-bold px-4" href="/login"
                            style="color: #007C84; border: solid 2.5px #007C84;">Masuk</a>
                        <a class="btn fs-5 fw-bold px-4" href="/registrasi"
                            style="color: white; background-color: #007C84;">Daftar</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-2">
            <div class="row justify-content-center my-5">
                @foreach ($produks as $produk)
                    <div class="col-sm-6">
                        <div class="card- shadow"
                            style="min-height: 10.5rem; max-height: 10.5rem; background-color:#F2F8F8; color:#007C84;">
                            <div class="card-body py-auto">
                                <div class="row">
                                    <div class="col-4 my-auto">
                                        <img class="shadow rounded-3" src="{{ asset('storage/'. $produk->gambar) }}" alt="{{ $produk->nama_produk }}" width="140">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="fw-bold text-capitalize">{{ $produk->nama_produk }}</h6>
                                        <p class="text-capitalize">{{ $produk->keterangan }}</p>
                                    </div>
                                </div>
                                <p class="mb-1 py-1">Telah Dibeli Sebanyak: 200</p>
                            </div>
                        </div>
                    </div>     
                @endforeach
            </div>
        </div>

        <div class="container my-3">
            <div class="container shadow py-3" style="background-color: #F2F8F8; color: #007C84;">
                <div class="row">
                    <div class="col-3 my-auto px-5">
                        <img class="shadow rounded-3" src="{{ asset('assets/img/toko.jpeg') }}" alt="tokoBibu"
                            style="max-height: 9rem">
                    </div>
                    <div class="col-9 pt-2 mb-0">
                        <h5 class="fw-bold mb-3">TENTANG <span class="fw-normal">KAMI</span></h5>
                        <p style="margin-bottom: 0 ;text-align: justify">Selama lebih dari 10 tahun Toko Ubi Madu
                            Cilembu telah hadir di kota Jember, Jawa Timur. Ubi yang kami pasarkan berasal langsung dari
                            Desa Cilembu, Jawa Barat. Ubi madu cilembu dengan ciri khas memiliki rasa manis seperti madu
                            yang kami jual merupakan produk dengan pilihan terbaik yang akan diberikan kepada customer.
                            Banyak manfaat yang didapatkan dengan mengonsumsi ubi madu cilembu ini, utamanya untuk
                            meningkatkan imunitas tubuh.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
