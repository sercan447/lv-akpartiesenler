@extends("backend.sablon/varsayilan")

@section("cssler")
@endsection

@section("javascriptsler")
@endsection

@section("icerik")

<div class="container">
  <div class="row">
    @foreach($videolar as $video)
      <div class="col-lg-3 col-sm-3 col-xs-2 col-xl-3">
        <!--Card Dark-->
        <div class="card card-dark">
            <!--Card image-->
            <div class="view overlay hm-white-slight">
            
            <iframe width="430" height="215" src="{{$video->videolink}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          
                <a>
                    <div class="mask"></div>
                </a>
            </div>
            <!--/.Card image-->
            <!--Card content-->
            <div class="card-body">
                <!--Social shares button-->

                <!--Title-->
                <p class="card-title"><b>{{ $video->videoadi }}</b></p>
                <hr>
                <!--Text-->
                <p class="card-text white-text"><!--<?= substr($video->videoadi,0,20) ?>--></p>
                <a href="#" class="d-flex flex-row-reverse">
                  <a href="">Video Düzenle</a>
                  |
                  <a href="">Sil</a>
                </a>
            </div>
            <!--/.Card content-->
        </div>
        <!--/.Card Dark-->
      </div>
      @endforeach

  </div>
</div>

@endsection
