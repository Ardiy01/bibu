<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shotcut icon" href="{{ asset('assets/img/Logo.png') }}">
    <title>BiBU</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="media-query.css">
</head>

<body class="login-sty">
    <main>
        <div class="row" style=" box-sizing: border-box;">
            <div class="col-12 col-sm-5 form-login">
                <div class="container py-1">
                    <div class="my-5 pt-5">
                        <div class="my-5 row">
                            <div class="col-6 text-end">
                                <img src="{{ asset('assets/img/Logo.png') }}" alt="logoBibu">
                            </div>
                            <div class="col-6">
                                <h2 class="d-inline my-auto" style="color: #007C84;">BiBU</h2>
                            </div>
                        </div>



                        <form action="/" method="post">
                            @csrf
                            <div class="container px-5">
                                @if (session()->has('loginGagal'))
                                    <p class="text-danger fw-bold py-1">
                                        {{ session('loginGagal') }}
                                    </p>
                                @endif
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        id="username" name="username" placeholder="Username">
                                    @error('username')
                                        <div class="invalid-feedback text-capitalize">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Password">
                                    @error('password')
                                        <div class="invalid-feedback text-capitalize">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="password">Password</label>
                                </div>

                                <!-- rember me -->
                                <div class="form-check my-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Ingat Saya
                                    </label>
                                </div>

                                <!-- button -->
                                <div class="d-grid gap-2 col-12 mx-auto mt-4">
                                    <button class="btn fw-bold py-2 fs-5 text-white" type="submit"
                                        style="background-color: #007C84;">Masuk</button>
                                </div>

                            </div>
                        </form>

                        <!-- register -->
                        <p class="text-center pt-2" style="color: rgba(0, 0, 0, 0.5);">Belum Punya Akun? <span><a
                                    class="text-decoration-none" href="/registrasi"
                                    style="color: rgba(255, 0, 0, 0.5)">Daftar</a></span></p>
                    </div>

                </div>
            </div>
            <div class="col-7 mx-0 gambar" style="background-color: rgba(45, 181, 178, 0.5);">
                <div class="text-center" style="margin-top: -5rem;">
                    <img src="{{ asset('assets/img/p2.png') }}" alt="image-login"
                        style="max-width: 25rem; overflow: hidden; margin-top: 12rem; margin-bottom: 12rem;">
                </div>

            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
