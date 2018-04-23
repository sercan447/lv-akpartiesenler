@extends("frontend/layouts/layout")

@section("css_files")

@endsection

@section("script_files")

@endsection

@section("icerik")

@php

$haberler = DB::table("psl_haberler")->limit(4)->get();

@endphp
<section id="sliderSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="slick_slider">


            @foreach($haberler as $haber)

                <div class="single_iteam">
                    <a href="{{route('haberoku')}}/{{$haber->id}}"> <img src="{{ asset('HaberResimleri/hresim') }}/{{$haber->haber_resmi}}" alt=""></a>
                    <div class="slider_article">
                        <h2><a class="slider_tittle" href="{{route('haberoku')}}/{{$haber->id}}">{{$haber->haber_baslik}}</a></h2>
                        <p><?= $haber->haber_icerik ?></p>
                    </div>
                </div>
                
                @endforeach
               
                
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="latest_post">
                <h2><span>Twitter </span></h2>
                <div style="height:200px" class="latest_post_container">
                    <a style="height:200px" data-height="1550" class="twitter-timeline" href="https://twitter.com/Burakselcukk44?ref_src=twsrc%5Etfw">Tweets by Burakselcukk44</a>
                    <script async src="https://platform.twitter.com/widgets.js" style="height:200px" charset="utf-8"></script>
                </div>
            </div>
        </div>

</section>
<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <div class="single_post_content">
                    <h2><span>BASKAN</span></h2>
                    <div class="single_post_content_left">
                        <ul class="business_catgnav  wow fadeInDown">
                            <li>
                                <figure class="bsbig_fig">
                                    <a href="pages/single_page.html" class="featured_img"> <img alt="" src="{{ asset('Resimler/ahmetkı') }}lıc.jpg"> <span class="overlay"></span> </a>
                                    <h3><a style="font-family: Arial, Helvetica, sans-serif" href="pages/single_page.html"><b>AK PARTİ ESENLER İLÇE GENÇLİK KOLLARI BAŞKANI</b></a> </h3>
                                    <p>
                                        1987 yılında Malatya’da doğdu.

                                        İlköğretim ve lise eğitimini Esenler’de tamamladı. Afyon Kocatepe Üni. Pazarlama ve Anadolu Üni. İşletme Fakültesi bitirdi. Halen İstanbul Üni. Siyaset Bilimi ve Uluslararası İlişkiler bölümünde yüksek lisans eğitimine devam etmektedir.
                                    </p>
                                </figure>
                            </li>
                        </ul>
                    </div>
                    <div class="single_post_content_right">
                        <!-- LightWidget WIDGET -->
                        <script src="//lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/15b18e3b338a5abe99f43e4009336f0d.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
                    </div>
                </div>
                <iframe width="660" height="315" src="https://www.youtube.com/embed/dZ39fe70n4o" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>


                <div class="single_post_content">
                    <h2><span>ESENLER GALERİ</span></h2>
                    <ul class="photograph_nav  wow fadeInDown">
                    <?php
									foreach($galeriResimler = Storage::disk("galeriuploads")->files("gresim/") as $ver){
								?>
                        <li>
                            <div class="photo_grid">
                                <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" 
                                href="{{ asset('GaleriResimleri/') }}/<?= $ver ?>" title="ESENLER GENÇLİK KOLLARI"> 
                                <img src="{{ asset('GaleriResimleri/') }}/<?= $ver ?>"  alt="" /></a> </figure>
                            </div>
                        </li>
                        
                        <?php
							}
						?>  
                    </ul>
                </div>
                <div class="single_post_content">

                </div>
            </div>

        </div>
</section>
@endsection