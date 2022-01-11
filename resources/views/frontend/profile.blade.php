@extends('layouts.frontend')

@section('title', "Profile")

@section('frontend-content')
<div class="container-custom h-full">
  <form  action="{{url('/update-profile')}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
    <div class="container pb-5">
      <div class="row pt-5">
        <div class="col-md-4 mb-5">
          <div class="card-custom d-flex flex-row p-3">
            <img class="small-card-profile" src="{{ asset("upload/profile/".auth()->user()->avatar) }}" alt="" srcset="">
            <div class="my-auto">
              <div class="text-head-3">{{ auth()->user()->name }} </div>
              <div class="text-italic-2">Admin werehouse </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-4"> Email</div>
            <div class="col-md-6 ">
              <div class="input-group mb-3">
                <input type="email" class="form-control card-custom" value="{{ auth()->user()->email }}" aria-label="Username"
                  aria-describedby="basic-addon1" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4"> Name</div>
            <div class="col-md-6 ">
              <div class="input-group mb-3">
                <input type="text" class="form-control card-custom" name="name" value="{{ auth()->user()->name }}" aria-label="Username"
                  aria-describedby="basic-addon1">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4"> No Telepone</div>
            <div class="col-md-6 ">
              <div class="input-group mb-3">
                <input type="text" class="form-control card-custom" name="telepon" value="{{ auth()->user()->telepon }}" aria-label="Username"
                  aria-describedby="basic-addon1">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4"> Ubah foto profile</div>
            <div class="col-md-6 ">
              <div class="input-group mb-3">
                <input type="file" class="form-control card-custom" name="profile_picture">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="main">
        <div class="container">
          <div class="accordion" id="faq">

            <div class="card">
              <div class="card-header" id="faqhead1">
                <a href="#" class="btn btn-header-link collapsed text-head-3" data-toggle="collapse" data-target="#faq1"
                  aria-expanded="true" aria-controls="faq1">Keamanan</a>
              </div>

              <div id="faq1" class="collapse" aria-labelledby="faqhead1" data-parent="#faq">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                  Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                  shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                  proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                  aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="faqhead2">
                <a href="#" class="btn btn-header-link collapsed text-head-3" data-toggle="collapse" data-target="#faq2"
                  aria-expanded="true" aria-controls="faq2">Kebijakan Privasi</a>
              </div>

              <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                  Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                  shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                  proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                  aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="faqhead3">
                <a href="#" class="btn btn-header-link collapsed text-head-3" data-toggle="collapse" data-target="#faq3"
                  aria-expanded="true" aria-controls="faq3">Bantuan</a>
              </div>

              <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                  Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                  shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                  proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                  aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="faqhead4">
                <a href="{{ route('faq') }}" class="btn btn-header-link collapsed text-head-3"
                  aria-expanded="true" >FAQ</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-success text-black text-head-3"> <i class="far fa-save"></i>
        Simpan Data
      </button>
    </div>
  </form>
</div>
@endsection

