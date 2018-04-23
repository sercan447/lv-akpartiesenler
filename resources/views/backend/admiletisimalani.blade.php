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
  <div class="row">

    <div class="col-lg-10 col-sm-7 col-xs-4">
{{ Form::open(array("url"=>"yonetici/admiletisimalani")) }}

  {{Form::label("sirketadi","Parti Adı") }}
    <input type="text" name="sirketadi"   value="{{$tablo_iletisim->sirket_adi}}" class="form-control" placeholder="Parti adı Giriniz" />
		{{Form::label("eposta1","E-Posta 1") }}
    <input type="text" name="eposta1"   value="{{$tablo_iletisim->eposta1}}" class="form-control" placeholder="E-Posta adresi giriniz" />
		{{Form::label("eposta2","E-Posta 2") }}
    <input type="text" name="eposta2"   value="{{$tablo_iletisim->eposta2}}" class="form-control" placeholder="ikinci E-Posta adresi giriniz." />

	{{Form::label("adres","Adres") }}
  <textarea id="summernote" name="adres">   {{$tablo_iletisim->adres}}  </textarea>

  {{Form::label("telefon","Telefon") }}
  <input type="text" name="telefon"  required value="{{$tablo_iletisim->telefon}}" class="form-control"  placeholder="(000) 555 55 55" />
  <br/>


  {{Form::submit("Kaydetiniz",array("class"=>"form-control btn btn-primary")) }}

{{ Form::close() }}
</div>
</div>
</div>
@endsection
