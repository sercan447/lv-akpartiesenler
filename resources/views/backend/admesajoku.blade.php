@extends("backend.sablon/varsayilan")

@section("cssler")
@endsection

@section("javascriptsler")
<script>
$(document).ready(function(){

	$('#summernote').summernote({
		height: 300
	});

});
</script>
@endsection

@section("icerik")
<div class="container">
  <div class="row">
      <div class="col-lg-11 col-xs-5 col-xl-7 col-md-6">
{{Form::label("kisiadisoyadi","Adı Soyadı") }}
    <input type="text" name="kisiadisoyadi"   value="{{$musteriayrinti->adsoyad}}" class="form-control"  />
    {{Form::label("kisitelefon","Telefonu") }}
    <input type="text" name="kisitelefon"   value="{{$musteriayrinti->telefon}}" class="form-control"  />
    {{Form::label("kisieposta","E-Posta") }}
    <input type="text" name="kisieposta"   value="{{$musteriayrinti->eposta}}" class="form-control"  />
    {{Form::label("konu","Konu") }}
    <input type="text" name="konu"   value="{{$musteriayrinti->konu}}" class="form-control"  />
  {{Form::label("mesaji","Mesaj") }}
  <textarea id="summernote" name="mesaji">{{$musteriayrinti->mesaj}}</textarea>

  </div>
  </div>
  </div>
  

@endsection
