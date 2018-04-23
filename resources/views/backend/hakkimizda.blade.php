@extends("backend.sablon/varsayilan")

@section("cssler")

@endsection

@section("javascriptsler")


<script>

$(document).ready(function(){

	// SUMMERNOTE WYSIWYG */

		$('#summernote').summernote({
			height: 300
		});


		$('#summernote1').summernote({
			height: 300
		});

		$('#airmode').summernote({
			height: 300,
			airMode: true
		});

/////////////
	$('form').validate();
	$('form').ajaxForm({
		beforeSubmit:function(){

		},
		success:function(response){
					swal(response.baslik,response.icerik,response.durum);
		},
		error:function(hata){
		    alert("HATALANDI :"+hata);
		}
	});
});

</script>


	<script type="text/javascript">


</script>

@endsection
@section("icerik")
<!-- BEGIN MAIN CONTENT -->
    <section class="content">
      <div class="row">
        <!-- BEGIN BASIC WYSIWYG -->
        <div class="col-md-12">
          <div class="grid">
            <div class="grid-header">
              <i class="fa fa-align-left"></i>
              <span class="grid-title">Hakkimizda Bölümü Düzenle</span>

            </div>
            <div class="grid-body">
					{{ Form::open(array("id"=>"form ","url"=>"yonetici/admfirmabilgi")) }}				
						
				{{ Form::label("vizyon_baslik","Konu Başlığı ") }}
				{{ Form::text("vizyon_baslik",$show_data->vizyon_baslik,array("class"=>"form-control")) }}

			{{ Form::label("vizyon_aciklama","Vizyon Açıklama") }}
		<textarea id="summernote" name="vizyon_aciklama">{{ $show_data->vizyon_aciklama}}</textarea>
			
		{{ Form::label("tarihce_baslik","Konu Başlığı") }}
		{{ Form::text("tarihce_baslik",$show_data->tarih_baslik,array("class"=>"form-control")) }}

		{{ Form::label("tarihce_aciklama","Tarihçe Açıklama") }}
		<textarea id="summernote1" name="tarihce_aciklama">{{ $show_data->tarih_aciklama}}</textarea>
				
	{{Form::submit("Bilgileri Kaydet",array("class"=>"form-control btn btn-success"))}}
							{{ Form::close()}}

            </div>
          </div>
        </div>
        <!-- END BASIC WYSIWYG -->
      </div>
    </section>
    <!-- END MAIN CONTENT -->
@endsection
