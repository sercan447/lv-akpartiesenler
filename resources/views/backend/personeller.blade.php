@extends("backend.sablon/varsayilan")

@section("cssler")
@endsection

@section("javascriptsler")
@endsection

@section("icerik")
<div class="container">
  <div class="row">
    @foreach($personeller as $personel)
      <div class="col-lg-4 col-sm-4 col-xs-6 col-xl-4">
        <!--Card Dark-->
        <div class="card card-dark">
            <!--Card image-->
            <div class="view overlay hm-white-slight">
                <img src="{{asset('PersonelResimleri/presim')}}/{{$personel->resimadi}}" class="img-fluid" alt="" width="300" height="300">
                <a>
                    <div class="mask"></div>
                </a>
            </div>
            <!--/.Card image-->
            <!--Card content-->
            <div class="card-body">
                <!--Social shares button-->

                <!--Title-->
                <p class="card-title"><b>{{ $personel->adisoyadi }}</b></p>
                <a href="#" class="d-flex flex-row-reverse">
                  <a href="{{route('admpersonelduzenle')}}?personelDuzenle={{$personel->numara}}">Personel Düzenle</a>
                  | <a href="{{route('admpersonelsil')}}/{{$personel->numara}}">Sil</a>
                </a>
                <hr>
                <!--Text-->
                <p class="card-text white-text"></p>
               
            </div>
            <!--/.Card content-->
        </div>
        <!--/.Card Dark-->
      </div>
      @endforeach

      <div>
                    <center>{{$personeller->links()}}</center>
      </div>

  </div>
</div>


@endsection
