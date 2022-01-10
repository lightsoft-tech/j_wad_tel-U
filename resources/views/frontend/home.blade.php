@extends('layouts.frontend')

@section('title', "Home")

@section('frontend-content')
<div class="container-custom">
  <div class="container">
    <div class="d-flex justify-content-center ">
      <div class="py-5 text-head">Welcome to
        <span style="color: var(--yellow-primary)">
          UPNORMAL
        </span>
      </div>
    </div>
    
    <div class="text-head-2 text-center mb-3">Update dan Berita</div> 
    <div class="container-fluid">
      {{-- <h1 class="text-center my-3">Projects and Sites</h1> --}}
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner row w-100 mx-auto">

          <div class="carousel-item card-berita-custom col-md-4 active">
            <a href="detail.html">

              <div class="card">
                <img class="img-fluid" alt="100%x280"
                  src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ee8417f0ea2a50d53a12665820b54e23">
                <div class="card-body">
                  <h4 class="card-title-1">Special title treatment</h4>
                  </p>
                </div>
              </div>
            </a>
          </div>
          
          @foreach ($berita as $item)
          <div class="carousel-item card-berita-custom col-md-4">
            <a href="detail.html">

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
        <div class="container">
          <div class="row">
            <div class="col-12 text-center mt-4">
              <a class="btn btn-outline-secondary mx-1 prev" href="javascript:void(0)" title="Previous">
                <i class="fa fa-lg fa-chevron-left"></i>
              </a>
              <a class="btn btn-outline-secondary mx-1 next" href="javascript:void(0)" title="Next">
                <i class="fa fa-lg fa-chevron-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="text-head-2 pt-5 text-center">Tentang kami</div>

    <div class="row pt-3 pb-3">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <ul class="icons d-flex justify-content-between">
          <li><a href="#" class="icon"><i class="fab fa-youtube"></i></a></li>
          <li><a href="#" class="icon"><i class="fab fa-line"></i></a></li>
          <li><a href="#" target="_blank" class="icon"><i class="fab fa-instagram"></i></a></li>
          <li><a href="#" target="_blank" class="icon"><i class="fab fa-linkedin"></i></a>
          </li>
        </ul>
      </div>
      <div class="col-md-3"></div>
    </div>

   

  </div>
</div>

@endsection
