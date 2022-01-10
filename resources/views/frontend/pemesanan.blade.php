@extends('layouts.frontend')

@section('title', "Pemesanan")

@section('frontend-content')
<div class="container-custom h-full">
  <div class="container">
    <div class="row pt-5">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="wrap-input100 validate-input">
          <!-- <span>
            <i class="fas fa-search"></i>
          </span> -->
          <input class="input100 card-custom" type="text" name="search" placeholder="search">
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
    <div class="row">

      @foreach ($menu as $item)
      <div class="col-md-4 my-3">
        <div class="card-custom p-3" style="width: 18rem;">
          <img class="card-img-top" style="height: 16rem;" src="{{asset('upload/menu')}}/{{$item->gambar}}" alt="Card image cap">
          <div class="card-body">
            <h5>{{$item->judul}}</h5>
            <p class="card-text card-title">{{ \Illuminate\Support\Str::limit($item->deskripsi, 30, $end='...') }}</p>
            <div class="text-head-3 text-left" style="color: var(--yellow-primary);">Rp {{$item->harga}}</div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>

</div>
@endsection