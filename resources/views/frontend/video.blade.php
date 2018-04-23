@extends("frontend/layouts/layout")

@section("css_files")

@endsection

@section("script_files")

@endsection

@section("icerik")

<section id="sliderSection">
    <div class="row">
        <section id="sliderSection">

            <div class="container">

            @php
         $videolar = DB::table("videolar")->orderBy("id","ASC")->limit(2)->get();
         $videolar2 = DB::table("videolar")->where("id",">",2)->get();
         @endphp
                <div class="row">

                    <div class="col-lg-12">
                    @foreach($videolar as $video)
                    <div class="col-lg-4">
                    <iframe width="360" height="215" src="{{$video->videolink}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                     </div>
                    @endforeach
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="latest_post">
                                <h2><span>Twitter </span></h2>
                                <div style="height:200px" class="latest_post_container">
                                    <a style="height:200px" data-height="530" class="twitter-timeline" href="https://twitter.com/Burakselcukk44?ref_src=twsrc%5Etfw">Tweets by Burakselcukk44</a>
                                    <script async src="https://platform.twitter.com/widgets.js" style="height:200px" charset="utf-8"></script>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <br /><br /><br />
                <div class="row">

                            

                                
                    <div class="col-lg-12">
                    @foreach($videolar2 as $video)
                    <div class="col-lg-4">
                    <iframe width="360" height="215" src="{{$video->videolink}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                     </div>
                    @endforeach
                    </div>

                </div>
                <br /><br /><br />

         


            </div>

        </section>


   

</section>

@endsection