@extends('layouts.frontend')

@section('title', "FAQ")

@section('frontend-content')
<div style="min-height: 100vh" class="container-custom">
  <div class="text-head-2 text-center pb-3 pt-5">FAQ</div>
  <div id="main">
    <div class="container">
      <div class="accordion" id="faq">

        @foreach ($faq as $item)
        <div class="card">
          <div class="card-header" id="faqhead{{ $item->id }}">
            <a href="#" class="btn btn-header-link collapsed text-head-3" data-toggle="collapse" data-target="#faq{{ $item->id }}"
              aria-expanded="true" aria-controls="faq1">{{ $item->judul }}</a>
          </div>
          <div id="faq{{ $item->id }}" class="collapse" aria-labelledby="faqhead{{ $item->id }}" data-parent="#faq">
            <div class="card-body">
            {{ $item->deskripsi }}
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>

</div>
@endsection

