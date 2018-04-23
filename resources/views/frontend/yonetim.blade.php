@extends("frontend/layouts/layout")

@section("css_files")

@endsection

@section("script_files")

@endsection

@section("icerik")
<section id="sliderSection">
    <div class="row">
        <div class="col-lg-12">
        <div class="col-lg-8 col-md-8 col-sm-8">

   

            <section id="sliderSection">


                <div style="" class="container">
                    <div class="col-lg-12">

                        <div style="float:right; margin-right:110px" class="col-lg-3 col-md-3 col-sm-3">
                            <div class="latest_post">
                                <h2><span>Twitter </span></h2>
                                <div style="height:200px" class="latest_post_container">
                                    <a style="height:200px" data-height="1150" class="twitter-timeline" href="https://twitter.com/Burakselcukk44?ref_src=twsrc%5Etfw">Tweets by Burakselcukk44</a>
                                    <script async src="https://platform.twitter.com/widgets.js" style="height:200px" charset="utf-8"></script>
                                </div>
                            </div>

                        </div>
                    
<!--
                        <img src="{{ asset('Resimler/ahmetkılıc.jpg') }}" width="15%" class="img-center" />
                        <p style="text-align:center"><b style="color:#0e70af">Hacı Ahmet KILIÇ</b></p>
                        <p style="text-align:center"><b style="color:#0e70af">Gençlik Kolları İlçe Başkanı</b></p>
                  
                    <br /><br />
                    -->
                    @php
                    $kisiler = DB::table("psl_personeller")->get();
                    @endphp
                   
                    <div class="col-lg-10">
                    @foreach($kisiler as $kisi)
                        <div class="col-lg-4">
                            <img src="{{ asset('PersonelResimleri/presim/') }}//{{$kisi->resimadi}}" width="60%" />
                            <p style="margin-left:25px"><b style="color:#0e70af">{{$kisi->adisoyadi}}</b></p>
                            <p><b style="color:#0e70af">{{$kisi->sorumluluk}}</b></p>
                        </div>
                        @endforeach 
                    </div>
                </div>


            </section>
        </div>
         
        </div>

</section>

@endsection