@extends("backend.sablon/varsayilan")

@section("cssler")

@endsection

@section("javascriptsler")

<script>
$(document).ready(function(){

	$('form').validate();
	$('form').ajaxForm({
		beforeSubmit:function(){

		},
		success:function(response){
					swal(response.baslik,response.icerik,response.durum);
		},
		error:function(hata){
		    swal(response.baslik,response.icerik,response.durum);
		}
	});

$('#summernote').summernote({
	height: 300
});

}); //document.ready
</script>
@endsection
@section("sayfaismi")
{{$sayfa}}
@endsection
@section("icerik")


<!-- BEGIN GRID NO-BORDER BOTH BLACK -->
<div class="col-md-12">
						<div class="grid no-border top bottom black">
							<div class="grid-header">
								<i class="fa fa-laptop"></i>
								<span class="grid-title">Kategori Ekle</span>
							</div>
							<div class="grid-body">


								<img src="{{asset('yuklenen/img/logos.png')}}"  height="200" width="222" />

									{{ Form::open(array("id"=>"form","name"=>"form","url"=>"yonetici/admkategoriekle","enctype"=>"multipart/form-data")) }}
								<div class="row">


									{{Form::file("kategoriresmi") }}

									<div class="col-md-10 col-sm-10 col-xs-12">
											{{ Form::label("kategoriadi","Kategori Adı") }}
											{{ Form::text("kategoriadi",null,array("class"=>"form-control","placeholder"=>"Kategori ismi giriniz")) }}
									</div>
	
									<div class="col-md-10 col-sm-10 col-xs-12 col-lg-12">
											{{ Form::label("kategoriaciklama","Kategori Açıklaması") }}
												<textarea id="summernote" name="kategoriaciklama"></textarea>
											<!--{{ Form::textarea("urunaciklama",null,array("class"=>"form-control")) }} -->
									</div>

									{{ Form::submit("Kategori Kayıt",array("class"=>"form-control btn btn-primary")) }}

								</div>
								{{ Form::close() }}

							</div>
						</div>
					</div>
					<!-- END GRID NO-BORDER BOTH BLACK -->

@endsection
