@extends("backend.sablon.varsayilan")

@section("cssler")
@endsection

@section("javascriptsler")
@endsection

@section("icerik")

<!-- BEGIN MAIN CONTENT -->
    <section class="content">
      <div class="row">
        <!-- BEGIN WIDGET -->
        <div class="col-sm-12 col-lg-12 col-xs-12 col-xl-12">
          <div class="row">

            <div class="col-lg-10 col-md-4 col-sm-6">
              <div class="grid widget bg-green">
                <div class="grid-body">
                  <span class="title">İletişimdeki Müşteri Sayısı</span>
                  <span class="value">{{$iletisimsayisi}}</span>

                </div>
              </div>
            </div>


            <div class="col-lg-10 col-md-4 col-sm-6">
              <div class="grid widget bg-yellow">
                <div class="grid-body">
                  <span class="title">Kayıtlı Kategori </span>
                  <span class="value">{{$kategorisayisi}}</span>

                </div>
              </div>
            </div>
            <div class="col-lg-10 col-md-4 col-sm-6">
								<div class="grid widget bg-red">
									<div class="grid-body">
										<span class="title">Yayındaki Haberler</span>
										<span class="value">{{$habersayisi}}</span>

									</div>
								</div>
							</div>

              <!--
              <div class="col-lg-10 col-md-4 col-sm-6">
								<div class="grid widget bg-teal">
									<div class="grid-body">
										<span class="title">Kullanıcı Sayısı</span>
										<span class="value">3</span>

									</div>
								</div>
							</div>
              -->

          </div>
        </div>
        <!-- END WIDGET -->
      </div>
      <div class="row">


      </div>
      <div class="row">



      </div>

    </section>
    <!-- END MAIN CONTENT -->

@endsection
