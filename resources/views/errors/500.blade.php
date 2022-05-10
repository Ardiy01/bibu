@extends('errors.layout')

@section('error')
    {{-- error image --}}
    <div class="text-center mt-5">
        <img src="{{ asset('assets/img/500.png') }}" alt="error403" width="450">
    </div>
    {{-- error info --}}
    <div class="text-center my-4">
        <h2 class="fw-bold">OPSS... SERVER SEDANG PENUH</h2>
    </div>
@endsection