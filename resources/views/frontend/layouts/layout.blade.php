<!DOCTYPE html>
<html>
<head>
    <title>AK PARTİ ESENLER GENÇLİK KOLLARI</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/font.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/jquery.fancybox.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/li-scroller.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/Site.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/slick.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/as.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/sweetalert2.min.css')}}" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" 
    crossorigin="anonymous">
    @yield("css_files")
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <div class="container">
        <header id="header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_top">
                        <div class="header_top_left">
                            <ul class="top_nav">
                                <li><a href="#">DAİMA İLERİ</a></li>
                                
                            </ul>
                        </div>
                        <div class="header_top_right">
                            <p>HACI AHMET KILIÇ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_bottom">
                        <div class="logo_area"><a href="{{URL('/')}}" class="logo"><img src="{{ asset('Resimler/akpartilogo.jpg') }}" alt=""></a></div>
                        <div class="add_banner"><a href="{{URL('/')}}"><img src="{{ asset('Resimler/akpartilogo.jpg') }}" alt=""></a></div>
                    </div>
                </div>
            </div>
        </header>
        <section id="navArea">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div id="navbar" style="background-color:#fd930a" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav main_nav">
                        <li class="active"><a href="~/Home/Index"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
                        <li><a href="{{URL('/')}}">Anasayfa</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Kadromuz</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Yürütme Kurulu</a></li>
                                <li><a href="{{route('yonetim')}}">Yönetim Kurulu</a></li>
                                <li><a href="#">Yedek Yönetim Kurulu</a></li>
                                <li><a href="#">Mahalle Başkanları</a></li>
                            </ul>
                        </li>

                        <li><a href="{{route('hakkimizda')}}">Hakkımızda</a></li>
                        <li><a href="{{route('video')}}">Video</a></li>
                        <li><a href="{{route('iletisim')}}">ILETISIM</a></li>
                        <li><a href="{{route('katil')}}">Bize Katıl</a></li>
                    </ul>
                </div>
            </nav>
            @php
                    $haberler = DB::table("psl_haberler")->get();
                    $sosyalmedya = DB::table("psl_sosyalmedya")->first();
            @endphp
        </section>
        <section id="newsSection">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="latest_newsarea">
                        <span>Esenlerden Haberler</span>
                        <ul id="ticker01" class="news_sticker">
                         @foreach($haberler as $haber)
                            <li>
                            <a href="{{route('haberoku')}}/{{$haber->id}}"><img src="{{ asset('HaberResimleri/hresim') }}/{{$haber->haber_resmi}}" alt="">{{$haber->haber_baslik}}</a>
                            </li>
                        @endforeach
                        </ul>
                        <div class="social_area">
                            <ul class="social_nav">
                                
                        
                                @if($sosyalmedya->twitter != "")
                                <li class="twitter"><a href="{{$sosyalmedya->twitter}}" target="_blank"></a></li>
                                @endif 
                            @if($sosyalmedya->facebook != "")
                                <li class="facebook"><a href="{{$sosyalmedya->facebook}}" target="_blank"></a></li>
                                @endif
						
							@if($sosyalmedya->pinterest != "")	
                                <li class="pinterest"><a href="{{$sosyalmedya->pinterest}}" target="_blank"></a></li>
                                @endif
							
							@if($sosyalmedya->googleplus != "")	
                                <li class="googleplus"><a href="{{$sosyalmedya->googleplus}}" target="_blank"></a></li>
                                @endif
                                @if($sosyalmedya->youtube != "")	
                                <li class="youtube"><a href="{{$sosyalmedya->youtube}}" target="_blank"></a></li>
                                @endif
                               
                                @if($sosyalmedya->vimeo != "")	
                                <li class="vimeo"><a href="{{$sosyalmedya->vimeo}}" target="_blank"></a></li>
                                @endif
                                @if($sosyalmedya->flickr != "")	
                                <li class="flickr"><a href="{{$sosyalmedya->flickr}}" target="_blank"></a></li>
                                @endif
                               
                               <!-- <li class="mail"><a href="{{$sosyalmedya->googleplus}}" target="_blank"></a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       

        @yield("icerik")

        <footer id="footer">
            <div class="footer_top">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="footer_widget wow fadeInLeftBig">
                            <h2>LOGOMUZ</h2>

                            <img class="img-responsive" src="{{ asset('Resimler/genclik-kolları.jpeg') }}" />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="footer_widget wow fadeInDown">
                            <h2>SAYFALAR</h2>
                            <ul class="tag_nav">
                                <li><a href="{{URL('/')}}">Anasayfa</a></li>
                                <li><a href="{{route('yonetim')}}">Kadromuz</a></li>
                                <li><a href="{{route('hakkimizda')}}">Hakkımızda</a></li>
                                <li><a href="{{route('video')}}">Video</a></li>
                                <li><a href="{{route('iletisim')}}">İletişim </a></li>
                                <li><a href="{{route('katil')}}">Bize Katil</a></li>
                             
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="footer_widget wow fadeInRightBig">
                            <h2>İletişim Bilgileri</h2>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="icon-box left media bg-deep p-30 mb-20">
                                        <a class="media-left pull-left" href="#"> <i class="pe-7s-map-2 text-theme-colored"></i></a>
                                        <div class="media-body">
                                            <strong>Lokasyon</strong>
                                            <p>Menderes Mahallesi, İnönü Cd. No:88, 34220 Esenler/İstanbul</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="icon-box left media bg-deep p-30 mb-20">
                                        <a class="media-left pull-left" href="#"> <i class="pe-7s-call text-theme-colored"></i></a>
                                        <div class="media-body">
                                            <strong>Telefon</strong>
                                            <p>+90 (551) 388 32 58</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="icon-box left media bg-deep p-30 mb-20">
                                        <a class="media-left pull-left" href="#"> <i class="pe-7s-mail text-theme-colored"></i></a>
                                        <div class="media-body">
                                            <strong>E-MAIL</strong>
                                            <p>info@yvmedya.com</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <p class="copyright">Copyright &copy;  <a href="https://yvmedya.com/">YVM MEDYA</a></p>
            </div>
        </footer>
    </div>




    <script src="{{ asset('frontend/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/jquery.li-scroller.1.0.js') }}"></script>
    <script src="{{ asset('frontend/jquery.newsTicker.min.js') }}"></script>
    <script src="{{ asset('frontend/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('frontend/custom.js') }}"></script>

    
<script	src="{{ asset('js/jquery.form.min.js') }}" ></script>
<script src="{{ asset('js/jquery.validate.min.js') }}" ></script>
<script src="{{ asset('js/messages_tr.js') }}" ></script>
<script src="{{ asset('js/sweetalert2.all.min.js')}}" ></script>	
    @yield("script_files")

</body>
</html>