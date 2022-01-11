@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="container">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Pesan!</strong> {{session('status')}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@elseif (session('error'))
<div class="container">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Pesan!</strong> {{session('error')}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('List Transaksi') }}</div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Tanggal</th>
                                <th scope="col" class="text-center w-25">Material</th>
                                <th scope="col" class="text-center">Harga</th>
                                <th scope="col" class="text-center">Status Order</th>
                                <th scope="col" class="text-center">Pembayaran</th>
                                <th scope="col" class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getList as $item)
                            <tr>
                                <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                <td>{{$item->tanggal_pengiriman}}</td>
                                <td>{{$item->deskripsi}}</td>
                                <td>@currency($item->harga)</td>
                                <td>{{$item->status_order}}</td>
                                <td>{{$item->pembayaran}}</td>
                                <td class="text-center">
                                    <form action="{{url('/back-transaksi')}}/{{$item->id}}/proses" method="POST" class="d-inline">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                            Dalam Proses
                                        </button>
                                    </form>
                                    |
                                    <form action="{{url('/back-transaksi')}}/{{$item->id}}/perjalanan" method="POST" class="d-inline">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                            Dalam Perjalanan
                                        </button>
                                    </form>
                                    |
                                    <form action="{{url('/back-transaksi')}}/{{$item->id}}/done" method="POST" class="d-inline">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                            Diterima
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection