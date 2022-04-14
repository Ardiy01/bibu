@extends('dashboard.layouts.main')

@section('content')
<div class="container py-2 mt-4 shadow" style="border-radius: 12px; background-color: rgba(234, 243, 244, 1);">
    <div class="container my-3">
        <div class="card shadow sty-card">
            <div class="card-header mb-0 pb-0 hd">
                <div class="text-center py-2">
                    <h6 class="text-uppercase fw-bold">Tambah Ulasan</h6>
                </div>
            </div>
            <hr class="mt-0 mb-0" style="background-color: rgba(0, 124, 132, 0.2);">
            <div class="card-body m-auto">
                <form class="form-horizontal poststars" action="/dashboard/produk/ulasan/{{ $ulasan->id - 1}}" id="addStar"  style="color: #007C84;">
                    @method('put')
                    @csrf
                        <div>
                            <h6>Rating:</h6>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <input class="star star-5" value="5" id="star-5" type="radio" name="rating"/>
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" value="4" id="star-4" type="radio" name="rating"/>
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" value="3" id="star-3" type="radio" name="rating"/>
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" value="2" id="star-2" type="radio" name="rating"/>
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-1" value="1" id="star-1" type="radio" name="rating"/>
                                <label class="star star-1" for="star-1"></label>
                            </div>
                        </div>
                        <div>
                            <h6>Ulasan: </h6>
                            <textarea name="ulasan" id="ulasan" cols="35" rows="4"></textarea>
                        </div>
                        <div class="col-12 text-sm-start text-center pt-sm-3 my-2" id="btn-ulasan">
                            <button type="submit" class="btn text-light shadow-sm ms-sm-5 mx-2 px-sm-3" style="background-color: #004347">Simpan</button>
                            <a href="/dashboard/pesanan" class="btn px-4 text-light shadow-sm" style="background-color: #2DB5B2">Batal</a>
                        </div>
                    {{-- </div> --}}
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection