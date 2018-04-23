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
				text : "Haberler Güncelleniyor..",
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

<div class="container">

{{ Form::open(array("id"=>"form","name"=>"form","method"=>"POST","url"=>"yonetici/admhaberduzenle","enctype"=>"multipart/form-data")) }}
  <div class="row">
      <div class="col-lg-11 col-xs-5 col-xl-7 col-md-6">
				<input type="hidden" name="guncelleme_id" value="{{$haber_edit->id}}" />
				<input type="hidden" name="resimvarmi" value="{{$haber_edit->haber_resmi}}" />

	<img src="{{asset('HaberResimleri/hresim/')}}/{{$haber_edit->haber_resmi}}" height="300" width="600"  /> <br/>

            {{Form::label("haberresmi","Haber Resmi Seçiniz")}}
            {{ Form::file("haberresmi") }}

            {{ Form::label("haberbaslik","Haber Başlığı") }}
            {{ Form::text("haberbaslik",$haber_edit->haber_baslik,array("class"=>"form-control","placeholder"=>"Başlık Giriniz.")) }}

            {{ Form::label("habericerigi","Haber İçeriği") }}
            	<textarea id="summernote" name="habericerigi">{{$haber_edit->haber_icerik}}</textarea>
            <!--{{ Form::textarea("habericerigi",null,array("class"=>"form-control","placeholder"=>"Haber içerigi giriniz ")) }} -->
					
              	{{ Form::submit("Haber Yayınla",array("class"=>"form-control btn btn-success btn-lg")) }}
      </div>
  </div>
  {{Form::close() }}
</div>
@endsection
