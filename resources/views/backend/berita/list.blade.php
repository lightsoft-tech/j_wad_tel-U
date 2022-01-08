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
                <div class="card-header">{{ __('Tambah Berita') }}</div>
                <div class="card-body">
                    <form action="{{url('/back-berita/add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Berita Makanan Enak" value="{{old('title')}}">
                            @error('title')
                            <div id="title" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="desc">Deskripsi</label>
                            <textarea name="desc" id="desc" rows="5" placeholder="Lorem ipsum" class="form-control @error('desc') is-invalid @enderror">{{old('desc')}}</textarea>
                            @error('desc')
                            <div id="desc" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" class="form-control" name="image">
                            </div>
                            @error('image')
                            <div id="image" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2 d-grid gap-2">
                            <button type="submit" class="btn btn-outline-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('List Berita') }}</div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center" style="width: 200px;">Gambar</th>
                                <th scope="col" class="text-center">Judul</th>
                                <th scope="col" class="text-center w-50">Deskripsi</th>
                                <th scope="col" class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getBerita as $item)
                            <tr>
                                <th scope="row" class="text-center align-middle">{{$loop->iteration}}</th>
                                <td>
                                    <img src="{{asset('upload/berita')}}/{{$item->gambar}}" class="img-fluid" alt="...">
                                </td>
                                <td class="text-center align-middle">{{$item->judul}}</td>
                                <td class="align-middle">{{$item->deskripsi}}</td>
                                <td class="text-center align-middle">
                                    <form action="{{url('/back-berita')}}/{{$item->id}}/edit" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </form>
                                    |
                                    <form action="{{url('/back-berita')}}/{{$item->id}}/drop" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger btn-circle" onclick="return confirm('Hapus Data ?')">
                                            <i class="fas fa-trash"></i>
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