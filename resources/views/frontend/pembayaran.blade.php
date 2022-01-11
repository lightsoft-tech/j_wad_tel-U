@extends('layouts.frontend')

@section('title', "Pilih pembayaran")

@section('frontend-content')
<form action="{{url('/pembayaran/bayar')}}" method="POST">
  @csrf
  <div class="container">
    <div class="text-head-2 text-center py-5">Pilih pembayaran</div>
    <div id="main">
      <div class="container">
        <div class="accordion" id="faq">
  
          <div class="card">
            <div class="card-header" id="faqhead1">
              <a href="#" class="btn btn-header-link collapsed text-head-3" data-toggle="collapse" data-target="#faq1"
                aria-expanded="true" aria-controls="faq1">
                <div class="row">
                  <div class="col-md-1"><img src="{{ asset('frontend/images/kartu/kartu_kredit.svg') }}" alt="" srcset=""></div>
                  <div class="col-md-11"> Kartu kredit/ Debit online</div>
                </div>
              </a>
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
                aria-expanded="true" aria-controls="faq2">
                <div class="row">
                  <div class="col-md-1"><img src="{{ asset('frontend/images/kartu/transfer_manual.svg') }}" alt="" srcset=""></div>
                  <div class="col-md-11"> Transfer Manual</div>
                </div>
              </a>
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
                aria-expanded="true" aria-controls="faq3">
                <div class="row">
                  <div class="col-md-1"><img src="{{ asset('frontend/images/kartu/virutal_acoount.svg') }}" alt="" srcset=""></div>
                  <div class="col-md-11"> Virtual Account</div>
                </div>
              </a>
            </div>
  
            <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-10">
  
                    <div class="row">
                      <div class="col-md-3">
                        <img src="{{ asset('frontend/images/kartu/bca.png') }}" alt="">
                      </div>
                      <div class="col-md-8">
                        <div class="text-head-3 text-left d-inline">BCA Virtual Account</div>
                      </div>
                      <div class="col-md-1">
                        <input type="checkbox" name="pembayaran" value="virtual account">
                      </div>
                    </div>
  
                    <div class="row mt-3">
                      <div class="col-md-3">
                        <img src="{{ asset('frontend/images/kartu/mandiri.png') }}" alt="">
                      </div>
                      <div class="col-md-8">
                        <div class="text-head-3 text-left d-inline">Mandiri VA</div>
                      </div>
                      <div class="col-md-1">
                        <input type="checkbox" name="pembayaran" value="virtual account">
                      </div>
                    </div>
  
                    <div class="row mt-3">
                      <div class="col-md-3">
                        <img src="{{ asset('frontend/images/kartu/bri.png') }}" alt="">
                      </div>
                      <div class="col-md-8">
                        <div class="text-head-3 text-left d-inline">Bank BRI VA</div>
                      </div>
                      <div class="col-md-1">
                        <input type="checkbox" name="pembayaran" value="virtual account">
                      </div>
                    </div>
  
                    <div class="row mt-3">
                      <div class="col-md-3">
                        <img src="{{ asset('frontend/images/kartu/danamon.png') }}" alt="">
                      </div>
                      <div class="col-md-8">
                        <div class="text-head-3 text-left d-inline">Danamond</div>
                      </div>
                      <div class="col-md-1">
                        <input type="checkbox" name="pembayaran" value="virtual account">
                      </div>
                    </div>
  
                    <div class="row mt-3">
                      <div class="col-md-3">
                        <img src="{{ asset('frontend/images/kartu/bni.png') }}" alt="">
                      </div>
                      <div class="col-md-8">
                        <div class="text-head-3 text-left d-inline">BNI Virtual Account</div>
                      </div>
                      <div class="col-md-1">
                        <input type="checkbox" name="pembayaran" value="virtual account">
                      </div>
                    </div>
  
                    <div class="row mt-3">
                      <div class="col-md-3">
                        <img src="{{ asset('frontend/images/kartu/btpn.png') }}" alt="">
                      </div>
                      <div class="col-md-8">
                        <div class="text-head-3 text-left d-inline">BTPN Virtual Account</div>
                      </div>
                      <div class="col-md-1">
                        <input type="checkbox" name="pembayaran" value="virtual account">
                      </div>
                    </div>
  
                  </div>
                </div>
              </div>
            </div>
  
          </div>
        </div>
      </div>
    </div>
    <div class="float-right">
      <button type="submit" class="btn btn-warning text-black text-head-3">Konfirmasi</button>
    </div>
  </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
  $("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
</script>
@endsection

