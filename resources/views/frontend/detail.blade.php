@extends('layouts.frontend')

@section('title', "Detail berita")

@section('frontend-content')

<div class="container-custom h-full">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-9">
        <div class="text-head-2 text-center pb-3 pt-5">{{ $berita->judul }}</div>
        <img src="{{asset('upload/berita')}}/{{$berita->gambar}}" class="img-fluid-custom pb-4" alt="Responsive image">

        <p class="regular-text">{{ $berita->deskripsi }}</p>

      </div>
      <div class="col-md-3 ">
        @foreach ($all_berita as $item) 
        <div class="card mb-4 card-berita-custom">
          <a href="/berita/{{$item->id }}">
            <div class="card">
              <img class="img-fluid" alt="100%x280"
                src="{{asset('upload/berita')}}/{{$item->gambar}}">
              <div class="card-body">
                <h4 class="card-title-1">{{ $item->judul }}</h4>
                </p>
              </div>
            </div>
          </a>
        </div>
        @endforeach
     
      </div>
    </div>
  </div>
</div>

@endsection

