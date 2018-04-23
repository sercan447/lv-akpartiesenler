@extends("backend.sablon/varsayilan")

@section("cssler")

@endsection

@section("javascriptsler")

<script>

$(document).ready(function(){

	$('#summernote').summernote({
		height: 300
	});

	$('form').validate();
	$('form').ajaxForm({
		beforeSubmit:function(){
			swal({
				title : "<i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i><span class='sr-only'>Loading...</span>",
				text : "Personel Kaydediliyor..",
				showConfirmButton:false
			});
		},
		success:function(response){
					swal(response.baslik,response.icerik,response.durum);
		}
	});
	
});//document.ready
</script>
@endsection

@section("icerik")

<div class="container">
<h1>Persenel Bilgilerinizi Buradan Ekleyebilirsiniz.</h1>
{{ Form::open(array("id"=>"form","name"=>"form","url"=>"yonetici/admpersonelekle","enctype"=>"multipart/form-data")) }}
  <div class="row">
      <div class="col-lg-11 col-xs-5 col-xl-7 col-md-6">

            {{Form::label("resmi","Persenol Resmi Seçiniz")}}
            {{ Form::file("resmi") }}

            {{ Form::label("adisoyadi","Personel Adı Soyadı") }}
            {{ Form::text("adisoyadi",null,array("class"=>"form-control","placeholder"=>"AdI Soyadı Giriniz.")) }}

			{{ Form::label("link","Personel Bağlantısı") }}
            {{ Form::text("link",null,array("class"=>"form-control","placeholder"=>"Herangi bir sosyal medya hesabı")) }}
			
			{{ Form::label("sorumluluk","Personel Sorumluluğu") }}
            {{ Form::text("sorumluluk",null,array("class"=>"form-control","placeholder"=>"(Şef,Aşçı,Komi vb.) gibi ")) }}


            {{ Form::label("hakkinda","Personel Hakkinda") }}
            	<textarea id="summernote" name="hakkinda"></textarea>
            <!--{{ Form::textarea("habericerigi",null,array("class"=>"form-control","placeholder"=>"Haber içerigi giriniz ")) }} -->

              	{{ Form::submit("Personel Kayıt",array("class"=>"form-control btn btn-success btn-lg")) }}
      </div>
  </div>
  {{Form::close() }}
</div>
@endsection
