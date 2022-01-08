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
                <div class="card-header">{{ __('Edit Berita') }}</div>
                <div class="card-body">
                    <form action="{{url('/back-berita/update',$getDetailBerita->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-2">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Paket A" value="{{$getDetailBerita->judul}}">
                            @error('title')
                            <div id="title" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="desc">Deskripsi</label>
                            <textarea name="desc" id="desc" rows="5" placeholder="Lorem ipsum" class="form-control @error('desc') is-invalid @enderror">{{$getDetailBerita->deskripsi}}</textarea>
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
@endsection