@extends('layouts.frontend')

@section('title', "Keranjang")

@section('frontend-content')
<div class="container">
  <form action="{{url('/keranjang/transaksi')}}" method="post">
    @csrf
    <div class="text-head-2 text-center py-5">Keranjang</div>
    <div class="row">
      {{-- <div class="col-md-6">
        <p>Pilih semua</p>
      </div> --}}
      {{-- <div class="col-md-6">
        <a href="#" class="btn btn-warning float-right">hapus</a>
      </div> --}}
    </div>
    <div class="">
      @foreach ($getCartMenu as $item)
      <div class="row mt-3">
        <div class="col-md-6">
          <div class="d-flex">
            {{-- <input class="my-auto mr-4" type="checkbox" id="vehicle1" name="vehicle1" value="Bike"> --}}
            <div class="">
              <p><b>{{$item->judul}}</b></p>
              <p>{{$item->deskripsi}}</p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <b> 
            <p class="float-right">@currency($item->harga)</p>
          </b>
        </div>
      </div>
      <hr>
      @endforeach
    </div>
    <div class="text-head-3 text-left">
      Pengiriman
    </div>
    <hr style="  border-top: 4px solid var(--yellow-primary);">
    <label for="alamat">Alamat Pengiriman</label>
    <input id="alamat" class="input100 card-custom" type="text" name="alamat_pengiriman" value="Upnormal dago"
      placeholder="Alamat">
      <br>
    <label for="waktu">Waktu Pengiriman</label>
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-6">
            <input id="waktu" class="input100 card-custom" type="text" name="tanggal_pengiriman" value="3 desember 2021"
              placeholder="Tanggal">
          </div>
          <div class="col-md-6">
            <input id="waktu" class="input100 card-custom" type="text" name="waktu_pengiriman" value="13.00" placeholder="Jam">
          </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
    <div class="row my-4">
      <div class="col-md-6">
        <div class="text-head-3 text-left">Total tagihan</div>
      </div>
      <div class="col-md-6">
        <div class="text-head-3 text-right">@currency($getCartMenu->sum('harga') + 30000)</div>
      </div>
    </div>
    <div class="my-3">
      <div class="text-head-3 text-left">
        Ringkasan
      </div>
      <hr style="  border-top: 4px solid var(--yellow-primary);">
      <div class="row my-4">
        <div class="col-md-6">
          <p>Total Harga</p>
        </div>
        <div class="col-md-6">
          <p class="text-right">@currency($getCartMenu->sum('harga'))</p>
        </div>
      </div>
      <hr>
      <div class="row my-4">
        <div class="col-md-6">
          <p>Pengiriman</p>
        </div>
        <div class="col-md-6">
          <p class="text-right">Rp 30.000</p>
        </div>
      </div>
      <hr>
      <div class="row my-4">
        <div class="col-md-6">
          <p>Diskon</p>
        </div>
        <div class="col-md-6">
          <p class="text-right">-</p>
        </div>
      </div>
      <hr>
      <div class="my-2 pb-2">
        <button type="submit" class="login100-form-btn">
          Lanjut ke Pembayaran
        </button>
      </div>
    </div>
  </form>
</div>
@endsection

