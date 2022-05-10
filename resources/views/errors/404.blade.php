@extends('errors.layout')

@section('error')
    {{-- error image --}}
    <div class="text-center">
        <img src="{{ asset('assets/img/404.png') }}" alt="error404" width="570">
    </div>
    {{-- error info --}}
    <div class="text-center my-5">
        <h2 class="fw-bold">HALAMAN TIDAK ADA</h2>
    </div>

@endsection