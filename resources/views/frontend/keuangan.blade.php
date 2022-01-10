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
          <th scope="col">Jumlah</th>
          <th scope="col">Harga</th>
          <th scope="col">Status order</th>
          <th scope="col">Pembayaran</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>@mdo</td>
          <td>@mdo</td>
          <td>@mdo</td>
          <td>@mdo</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection