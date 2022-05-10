@extends('errors.layout')

@section('error')
    {{-- error image --}}
    <div class="text-center mt-5">
        <img src="{{ asset('assets/img/403.png') }}" alt="error403" width="400">
    </div>
    {{-- error info --}}
    <div class="text-center my-4">
        <h2 class="fw-bold">OPSS... ANDA TIDAK PUNYA AKSES</h2>
    </div>
@endsection