@extends('layouts.frontend')

@section('title', "Keuangan")

@section('frontend-content')
<div class="container ">
  <div class="text-head-2 text-center py-5">Transaksi</div>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Material</th>
          {{-- <th scope="col">Jumlah</th> --}}
          <th scope="col">Harga</th>
          <th scope="col">Status order</th>
          <th scope="col">Pembayaran</th>
          {{-- <th scope="col">Aksi</th> --}}
        </tr>
      </thead>
      <tbody>
        @foreach ($getRiwayat as $item)   
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$item->tanggal_pengiriman}}</td>
          <td>{{$item->judul}}</td>
          {{-- <td>@mdo</td> --}}
          <td>@currency($item->harga)</td>
          <td>{{$item->status_order}}</td>
          <td>{{$item->pembayaran}}</td>
          {{-- <td>@mdo</td> --}}
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (Session::has('paySuccess'))
    <script>
        swal("Berhasil", "{!! Session::get('paySuccess') !!}", "success",{
            button: "OK",
        })
    </script>
@endif
@endsection