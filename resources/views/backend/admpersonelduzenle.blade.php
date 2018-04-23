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
				text : "Personel Yükleniyor desem.",
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
<h1>Persenel Bilgilerinizi Buradan Güncelleyebilirsiniz.</h1>
{{ Form::open(array("id"=>"form","name"=>"form","url"=>"yonetici/admpersonelduzenle","enctype"=>"multipart/form-data")) }}
 
 <input type="hidden" name="guncelleme" value="{{$personel_edit->numara}}" />
<input type="hidden" name="resimvarmi" value="{{$personel_edit->resimadi}}" />

  <div class="row">
      <div class="col-lg-11 col-xs-5 col-xl-7 col-md-6">
	@if($personel_edit->resimadi != null || $personel_edit->resimadi != "")
	<img src="{{asset('PersonelResimleri/presim/'.$personel_edit->resimadi)}}"  width="300" height="300" /> 
	@else
	<img src="{{asset('resim-yok.png')}}" width="300" height="300" /> 
	@endif
	<br/>
            
			{{Form::label("resmi","Personel Resmi Seçiniz")}}
            {{ Form::file("personelresmi") }}

            {{ Form::label("adisoyadi","Personel Adı Soyadı") }}
            {{ Form::text("adisoyadi",$personel_edit->adisoyadi,array("class"=>"form-control","placeholder"=>"AdI Soyadı Giriniz.")) }}

			{{ Form::label("link","Personel Bağlantısı") }}
            {{ Form::text("link",$personel_edit->link,array("class"=>"form-control","placeholder"=>"Herangi bir sosyal medya hesabı")) }}
			
			{{ Form::label("sorumluluk","Personel Sorumluluğu") }}
            {{ Form::text("sorumluluk",$personel_edit->sorumluluk,array("class"=>"form-control","placeholder"=>"(Şef,Aşçı,Komi vb.) gibi ")) }}


            {{ Form::label("hakkinda","Personel Hakkinda") }}
            	<textarea id="summernote" name="hakkinda">{{$personel_edit->hakkinda }}</textarea>
          
              	{{ Form::submit("Personel Kayıt",array("class"=>"form-control btn btn-success btn-lg")) }}
      </div>
  </div>
  {{Form::close() }}
</div>
@endsection
