@extends('dashboard.layouts.main')

@section('content')
    <div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
        {{-- data rekapitulasi --}}
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
                        <h6 class="fw-bold">Laba Penjualan</h6>
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
                        <h6 class="fw-bold" style="color: #007C84">Rata - Rata Pendapatan</h6>
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
@endsection
@push('script')
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
@endpush
