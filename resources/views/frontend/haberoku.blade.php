@extends("frontend/layouts/layout")

@section("css_files")

@endsection
@section("script_files")

@endsection
@section("icerik")
<section id="sliderSection">
    <div class="row">



            <div class="container">
                <div class="col-lg-12">
                    <div style="float:right; margin-right:50px" class="col-lg-3 col-md-3 col-sm-3">
                        <div class="latest_post">
                            <h2><span>Twitter </span></h2>
                            <div style="height:200px" class="latest_post_container">
                                <a style="height:200px" data-height="1250" class="twitter-timeline" href="https://twitter.com/Burakselcukk44?ref_src=twsrc%5Etfw">Tweets by Burakselcukk44</a>
                                <script async src="https://platform.twitter.com/widgets.js" style="height:200px" charset="utf-8"></script>
                            </div>
                        </div>
                    </div>
                   <h3>{{$haber->haber_baslik}} </h3>
                    <div class="col-lg-8">
                        <p style="font-family:Raleway; ">
                        <img src="{{ asset('HaberResimleri/hresim') }}/{{$haber->haber_resmi}}" class="img-responsive" ?>
                        </p>
                        <p style="font-family:Raleway; ">
                        <?php echo $haber->haber_icerik; ?>
                        </p>
                    </div>
                </div>
            </div>


        </section>
       

</section>

@endsection