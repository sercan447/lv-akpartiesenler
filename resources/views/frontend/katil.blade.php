@extends("frontend/layouts/layout")

@section("css_files")

@endsection

@section("script_files")

<script>
$(document).ready(function(){

	$('form').validate();
	$('form').ajaxForm({
		beforeSubmit:function(){
			swal({
				title : "<i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i><span class='sr-only'>Loading...</span>",
				text : "Mesaj İletiliyor..",
				showConfirmButton:false
			});
		},
		success:function(response){
					swal(response.baslik,response.icerik,response.durum);
		}
    });
    
	
});
</script>
@endsection

@section("icerik")

<section id="sliderSection">


    <div class="col-md-12">
        <h2 class="mt-0 mb-20 line-height-1" style="font-family:'Myriad Pro'">Katılım Formu</h2>
        <!-- Contact Form -->
        <form id="form" name="form" class="" action="{{route('katil')}}" method="post">
                {{csrf_field()}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input id="adsoyad" name="adsoyad" class="form-control" type="text" placeholder="Adınız, Soyadınız" required="">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input id="eposta" name="eposta" class="form-control required email" type="email" placeholder="E-Posta giriniz">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input id="telefon" name="telefon" class="form-control required " type="text" placeholder="Telefon(isteğe bağlı)">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input id="form_subject" name="konu" class="form-control required" type="text" placeholder="Konu giriniz">
                    </div>
                </div>
               
            </div>

            <div class="form-group">
                <textarea id="form_message" name="mesaj" class="form-control required" rows="5" placeholder="Mesajınızı yazınız."></textarea>
            </div>
            <div class="form-group">
                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                <button type="submit" class="btn btn-primary" data-loading-text="Lütfen bekleyiniz...">Katıl</button>
            </div>
        </form>

    </div>
</section>

@endsection