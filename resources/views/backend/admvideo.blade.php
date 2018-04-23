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
				text : "Video Kaydediliyor..",
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
<h1>Video Paylaşım Modülü</h1>
{{ Form::open(array("id"=>"form","name"=>"form","url"=>"yonetici/admvideoekle")) }}
  <div class="row">
      <div class="col-lg-11 col-xs-5 col-xl-7 col-md-6">

        

            {{ Form::label("videolink","Video Linki giriniz." ) }}
            {{ Form::text("videolink",null,array("class"=>"form-control","placeholder"=>"Örnek : (https://www.youtube.com/watch?v=99999999) gibi")) }}

			{{ Form::label("videoad","Video Adı ") }}
            {{ Form::text("videoad",null,array("class"=>"form-control","placeholder"=>"Video adı giriniz.")) }}

              	{{ Form::submit("Video Kaydet",array("class"=>"form-control btn btn-success btn-lg")) }}
      </div>
  </div>
  {{Form::close() }}
</div>
@endsection
