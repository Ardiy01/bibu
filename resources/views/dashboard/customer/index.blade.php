@extends('dashboard.layouts.main')

@section('content')
    <div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
        <div class="container my-3">
            <div class="card shadow sty-card">
                <div class="card-header mb-0 pb-0 hd">
                    <div class="text-center my-2">
                        <h6 class="text-uppercase fw-bold">Data Profil Customer</h6>
                    </div>
                    <hr class="mt-0 mb-0" style="background-color: rgba(0, 124, 132, 0.2)">
                </div>
                @if ($users->count())
                    @foreach ($users as $user)
                        <div class="card-body ulasan zoom">
                            <a href="/dashboard/customer/{{ $user->id }}" style="text-decoration: none; color: #007C84">
                                <div class="container bg-light py-2  border border-dark sty-ulasan">
                                    <div class="row">
                                        <div class="col-sm-1 col-12 text-sm-start text-center my-auto profil-img-cus">
                                            <img src="{{ asset('storage/' . $user->profil) }}" alt="{{ $user->nama }}"
                                                class="sty-profil-cus shadow-sm">
                                        </div>
                                        <div class="col-sm-8 col-12 text-center mt-sm-0 mt-2 mx-sm-3 text-sm-start">
                                            <h6 class="fw-bold">{{ $user->nama }}</h6>
                                            <p class="mb-1">{{ $user->nomer_telepon }}</p>
                                            <p class="mb-0">
                                                {{ $user->jalan .' no. ' .$user->nomor .', ' .$user->kecamatan->nama_kecamatan .', ' .$user->kabupaten->nama_kabupaten }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <h4 class="text-center m-auto">Belum ada Customer</h4>
                @endif
                <div class="d-flex justify-content-center my-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
