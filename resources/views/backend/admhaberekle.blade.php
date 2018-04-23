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
				text : "Etkinlik Kaydediliyor..",
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

{{ Form::open(array("id"=>"form","name"=>"form","url"=>"yonetici/admhaberekle","enctype"=>"multipart/form-data")) }}
  <div class="row">
      <div class="col-lg-11 col-xs-5 col-xl-7 col-md-6">

            {{Form::label("haberresmi","Etkinlik Resmi Seçiniz")}}
            {{ Form::file("haberresmi") }}

            {{ Form::label("haberbaslik","Etkinlik Başlığı") }}
            {{ Form::text("haberbaslik",null,array("class"=>"form-control","placeholder"=>"Başlık Giriniz.")) }}

			{{ Form::label("haberlink","Etkinlik Bağlantısıı") }}
            {{ Form::text("haberlink",null,array("class"=>"form-control","placeholder"=>"http:://www.link.com")) }}


            {{ Form::label("habericerigi","Etkinlik İçeriği") }}
            	<textarea id="summernote" name="habericerigi"></textarea>
            <!--{{ Form::textarea("habericerigi",null,array("class"=>"form-control","placeholder"=>"Haber içerigi giriniz ")) }} -->

              	{{ Form::submit("Etkinlik Yayınla",array("class"=>"form-control btn btn-success btn-lg")) }}
      </div>
  </div>
  {{Form::close() }}
</div>
@endsection
