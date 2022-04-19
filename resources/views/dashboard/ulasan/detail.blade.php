@extends('dashboard.layouts.main')

@section('content')
<div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
  <div class="container my-3">
    <div class="card shadow sty-card">
      <div class="card-header mb-0 pb-0 hd">
          <div class="text-center py-2">
              <h6 class="text-uppercase fw-bold">Ulasan</h6>
          </div>
          <hr class="mt-0 mb-0" style="background-color: rgba(0, 124, 132, 0.2)">
        </div>
        <div class="mb-0 d-flex justify-content-center my-2">
          <div class="my-auto">
            <span class="iconify fs-6" data-icon="ant-design:star-filled" style="color: #007c84;"></span>
          </div>
          <div class="my-auto">
            <p class="text-center mb-0 fw-bold fs-4">
              @rating($rating->avg('rating'))<span class="fs-6">/5.0</span>
            </p>   
          </div>
        </div>
        <hr class="mt-2 mb-3 mb-sm-0" style="background-color: rgba(0, 124, 132, 0.2); height: 2px">
      @foreach ($ulasans as $ulasan)
        @if ($ulasan->rating > 0) 
          <div class="card-body ulasan">
            <div class="container bg-light py-2  border border-dark sty-ulasan">
                <div class="my-0 row">
                    <div class="row col-sm-4 col-4">
                        <div class="col-12">
                            <h6 class="nama">{{ $ulasan->user->nama }}</h6>
                        </div>
                        <div class="col-12 my-1 img-user">
                            <img class="m-auto rounded-circle"  src="Logo.png" alt="logo" style="max-width: 2.5rem">
                        </div>
                    </div>
                    <div class="text-center col-sm-6 col-8">
                        <div class="col-12">
                          @for ($i = 0; $i < $ulasan->rating; $i++)
                            <span class="iconify d-inline" data-icon="ant-design:star-filled" style="color: #007c84;"></span>
                          @endfor
                        </div>
                        <div class="col-12 ">
                            <p class="fw-bold text-capitalize">{{ $ulasan->ulasan }}</p>
                        </div>
                    </div>
                    <div class="text-end fw-bold col-sm-2 col-12 tgl">
                      <p>{{ $ulasan->updated_at->isoFormat('D MMMM Y') }}</p>
                    </div>
                </div>
            </div>
        </div>    
        @endif
      @endforeach
      <div class="d-flex justify-content-center my-3">
        {{ $ulasans->links() }}
      </div>
    </div>
  </div>
</div>
@endsection