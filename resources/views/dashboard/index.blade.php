@extends('dashboard.layouts.main')

@section('content')
{{-- data rekapitulasi --}}
@can('pemilik')
    <div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
        <div class="container row my-3">
            <div class="col-sm-4  my-auto">
                <label for="filter" class="form-label fs-6 fw-bold mx-2" style="color: #007C84">Bulan</label>
                <div class="input-group shadow">
                    <select class="form-select fw-bold" style="color: #007C84" id="filter" aria-label="Example select with button addon" name="filter">
                        @foreach ($bulan as $item)
                            <option value="{{ $item->value }}" >{{ $item->bulan . ' ' . $tahun }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="card-style">
                    <div class="bg-transparent" style="color: #007C84">
                        <h6 class="fw-bold">Laba Penjualan/Bulan</h6>
                    </div>
                    <div class="bg-white rounded-3 shadow mt-3 py-1" style="background-color: #dbeaec; color: #007C84"
                        id="laba">
                        <h5 class="card-title">@currency($pendapatan - $pengeluaran)</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="card-style">
                    <div class="bg-transparent">
                        <h6 class="fw-bold" style="color: #007C84">Rata - Rata Pendapatan/Hari</h6>
                    </div>
                    <div  id="pendapatan" class="card-body bg-white shadow rounded-3 mt-3 py-1"
                        style="background-color: #dbeaec; color: #007C84">
                        <h5 class="card-title">@currency($pendapatan / 30)</h5>
                    </div>
                </div>
            </div>
            {{-- grafik --}}
            <canvas class="my-4 w-100" id="grafik" width="900" height="380"></canvas>
        </div>
    </div>
        @endcan

        {{-- customer --}}
        @can('customer')
        <div class="container py-2 mt-3 ">
            {{-- welcome --}}
            <div class="container row my-2 shadow-sm rounded-3" style="background-color: #B5E6EE; color: #007C84;">
                <div class="col-8 py-5">
                    <h2 class="fw-bold mx-5">Hi, {{ auth()->user()->nama }}</h2>
                    <h6 class="mx-5">Dapatkan Ubi Cilembu Yang Anda Inginkan</h6>
                </div>
                <div class="col-4">
                    <img class="mx-5 mb-5" src="{{ asset('assets/img/welcome.png') }}" alt="welcome" height="185" style="position: absolute; margin-top: -1rem;">
                </div>
            </div>


            {{-- rekomendasi produk --}}
            <div class="container my-4">
                    <div class="row justify-content-center">
                        @if ($produkUser->count())
                            @foreach ($produkUser as $produk)
                                <div class="col-sm-6">
                                <div class="card- shadow" style="min-height: 10rem; max-height: 10rem; background-color:#EAF3F4; color:#007C84;">
                                    <div class="card-body py-auto">
                                        <div class="row">
                                            <div class="col-4 my-auto">
                                                <img class="shadow rounded-3" src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" width="140">
                                            </div>
                                            <div class="col-8">
                                                <h6 class="fw-bold text-capitalize">{{ $produk->nama_produk }}</h6>
                                                <p class="text-capitalize">{{ $produk->keterangan }}</p>
                                                <p class="mb-0 pb-0">Telah Dibeli Sebanyak: {{ $produk->total }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            @endforeach 
                        @else
                            @foreach ($produk as $prd)
                                <div class="col-sm-6">
                                <div class="card- shadow" style="min-height: 10rem; max-height: 10rem; background-color:#EAF3F4; color:#007C84;">
                                    <div class="card-body py-auto">
                                        <div class="row">
                                            <div class="col-4 my-auto">
                                                <img class="shadow rounded-3" src="{{ asset('storage/' . $prd->gambar) }}" alt="{{ $prd->nama_produk }}" width="140">
                                            </div>
                                            <div class="col-8">
                                                <h6 class="fw-bold text-capitalize">{{ $prd->nama_produk }}</h6>
                                                <p class="text-capitalize">{{ $prd->keterangan }}</p>
                                                <p class="mb-0 pb-0">Rating: <span class="iconify" data-icon="ant-design:star-filled"
                                                    style="color: #007c84;"></span>@rating($prd->rat)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            @endforeach 
                        @endif
                    </div>
            </div>

            {{-- informasi toko --}}
            <div class="container shadow py-3" style="background-color: #EAF3F4; color: #007C84;">
                <div class="row">
                    <div class="col-3">
                        <img class="shadow rounded-3" src="{{ asset('assets/img/toko.jpeg') }}" alt="tokoBibu" style="max-height: 9rem">
                    </div>
                    <div class="col-9 py-2">
                        <h5 class="fw-bold mb-3">TENTANG  <span class="fw-normal">KAMI</span></h5>
                        <p style="text-align: justify">Selama lebih dari 10 tahun Toko Ubi Madu Cilembu telah hadir di kota Jember, Jawa Timur. Ubi yang kami pasarkan berasal langsung dari Desa Cilembu, Jawa Barat. Ubi madu cilembu dengan ciri khas memiliki rasa manis seperti madu yang kami jual merupakan produk dengan pilihan terbaik yang akan diberikan kepada customer. Banyak manfaat yang didapatkan dengan mengonsumsi ubi madu cilembu ini, utamanya untuk meningkatkan imunitas tubuh.</p>
                    </div>
                </div>
            </div>
        </div>
        @endcan
@endsection
@push('script')
@can('pemilik')
    
    <script>
        $(document).ready(function() {
            $('#filter').on('change', function() {
                var value = $('#filter').val();
                $.ajax({
                    type: "get",
                    url: "dashboard",
                    data: {value: value},
                    dataType: "json",
                    success: function(data) {
                        $('#laba').html(" ");
                        $('#laba').html('<h5 class="card-title"> Rp. ' + data.laba.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +'</h5>');

                        $('#pendapatan').html(" ");
                        $('#pendapatan').html('<h5 class="card-title"> Rp. ' + data.pemasukan.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +'</h5>');
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        window.onload = function() {
            // Graphs
            var ctx = document.getElementById('grafik')
            // eslint-disable-next-line no-unused-vars
            var grafik = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
                    ],
                    datasets: [{
                        label: 'Pendapatan',
                        data: <?= json_encode($data_pendapatan) ?>,
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: 'rgba(67, 177, 74, 1)',
                        borderWidth: 4,
                        pointBackgroundColor: 'rgba(67, 177, 74, 1)'
                    }, {
                        label: 'Pengeluaran',
                        data: <?= json_encode($data_pengeluaran) ?>,
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#ff0000',
                        borderWidth: 4,
                        pointBackgroundColor: '#ff0000'
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontColor: 'rgba(0, 124, 132, 0.7)',
                                beginAtZero: false
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontColor: 'rgba(0, 124, 132, 0.7)',
                                beginAtZero: false
                            }
                        }]
                    },
                    legend: {
                        display: true
                    }
                }
            });
        };
    </script>
@endcan
@endpush
