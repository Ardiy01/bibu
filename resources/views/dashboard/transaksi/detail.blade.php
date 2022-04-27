@extends('dashboard.layouts.main')

@section('content')
    <div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
        <div class="container my-3">
            <div class="card shadow sty-card">
                <div class="card-header mb-0 pb-0 hd pt-0 mt-0">
                    <div class="row mx-2 my-2">
                        <div class="col-8 my-auto fw-bold text-uppercase" style="color: #007C84;">
                            <a href="/dashboard/transaksi" class="mx-1 text-center" style="text-decoration: none">
                                <span class="iconify fw-bold" data-icon="ooui:next-rtl" style="color: #007c84;"></span>
                            </a>
                            Detail Transaksi
                        </div>
                        <div class="col-4 text-end mb-0" @if ($transaksi->jenis_transaksi->kategori == "Pemasukan")
                            style="visibility: hidden"
                        @endif>
                            <a href="/dashboard/transaksi/{{ $transaksi->id }}/edit" class="btn sty-btn-edit">
                                <span class="iconify" data-icon="akar-icons:edit"
                                    style="color: #007c84; font-size: 1.2rem; "></span>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="mt-0 mb-0" style="background-color: rgba(0, 124, 132, 0.2);">
                <div class="card-body mt-0 mx-sm-0 mx-0">
                    <div class="card-body mt-0 mx-1">
                        <table cellpadding="4" class="mx-auto">
                            <tr>
                                <td class="fs-6" style="padding-right: 4rem; padding-bottom: 0.6rem">Jenis Transaksi</td>
                                <td style="padding-bottom: 0.6rem">:</td>
                                <td class="fs-6" style="padding-left: 1rem; padding-bottom: 0.6rem">{{ $transaksi->jenis_transaksi->kategori }}</td>
                            </tr>
                            <tr>
                                <td class="fs-6" style="padding-right: 4rem; padding-bottom: 0.6rem">Tanggal</td>
                                <td style="padding-bottom: 0.6rem">:</td>
                                <td class="fs-6" style="padding-left: 1rem; padding-bottom: 0.6rem">{{ $transaksi->updated_at->isoFormat('DD/MM/Y') }}</td>
                            </tr>
                            <tr>
                                <td class="fs-6" style="padding-right: 4rem; padding-bottom: 0.6rem">Nominal</td>
                                <td style="padding-bottom: 0.6rem">:</td>
                                <td class="fs-6" style="padding-left: 1rem; padding-bottom: 0.6rem">@currency($transaksi->nominal)</td>
                            </tr>
                            <tr>
                                <td class="fs-6" style="padding-right: 4rem; padding-bottom: 0.6rem">Keterangan</td>
                                <td style="padding-bottom: 0.6rem">:</td>
                                <td class="fs-6 text-capitalize" style="padding-left: 1rem; padding-bottom: 0.6rem">{{ $transaksi->keterangan }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
