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
            <form action="{{url('keranjang/add')}}/{{$item->id}}" method="post" class="mt-3">
              @csrf
              <button type="submit" class="login100-form-btn">
                <i class="fa fa-plus"></i>&nbsp; Keranjang
              </button>
            </form>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (Session::has('keranjangSuccess'))
    <script>
        swal("Berhasil", "{!! Session::get('keranjangSuccess') !!}", "success",{
            button: "OK",
        })
    </script>
@endif
@endsection