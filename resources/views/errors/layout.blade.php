<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>BiBU</title>
  </head>
  <body style="background-color: #F5FAFA; color:#007C84;">
    <div class="container ">
        {{-- logo --}}
        <div class="mb-1 mt-5 row">
            <div class="col-6 text-end">
                <img src="{{ asset('assets/img/Logo.png') }}" alt="logoBibu">
            </div>
            <div class="col-6">
                <h2 class="d-inline my-auto" style="color: #007C84;">BiBU</h2>
            </div>
        </div>

        @yield('error')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>