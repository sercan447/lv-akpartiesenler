@extends("backend.sablon/varsayilan")

@section("cssler")

@endsection

@section("javascriptsler")

<script type="text/javascript">
  /* MAGNIFIC POPUP */
  $('.popup-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function(item) {
        return item.el.attr('title') + '<small>Pusula Cafe Resturant</small>';
      }
    }
  });

	$(document).ready(function(){
		$('#resimsil').validate();
	$('#resimsil').ajaxForm({
		beforeSubmit:function(){
			swal({
				title : "<i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i><span class='sr-only'>Loading...</span>",
				text : "Resimler Siliniyor..",
				showConfirmButton:false
			});
		},
		success:function(response){
					swal(response.baslik,response.icerik,response.durum);
		}
	});

	});
</script>

<script>
$(document).ready(function(){


});
</script>

@endsection

@section("icerik")
<section class="content">
				<div class="row">
					<label>Galeri Resim Yükle</label>

					{{ Form::open(array("id"=>"form","url"=>"yonetici/admgaleri","enctype"=>"multipart/form-data")) }}
						{{Form::file("galeriresim[]",["multiple"=>"multiple"] ) }}
						<br/>
						{{Form::submit("Resim Kaydet",array("class"=>"form-control btn btn-success")) }}

					{{ Form::close() }}
					<!-- BEGIN GALLERY -->
					<div class="col-xl-12">
						<div class="popup-gallery">
								<?php
									foreach($galeriResimler = Storage::disk("galeriuploads")->files("gresim/") as $ver){
								?>
					
							<a href="{{ asset('GaleriResimleri/') }}/<?= $ver ?>" title="Photo 1">
								<img src="{{ asset('GaleriResimleri/') }}/<?= $ver ?>"width="123" height="100"  alt="">
								
								</a>
								<?php
							}
								?>

						</div>
						<br>

					</div>
					<!-- END GALLERY -->
				</div>
			</section>
@endsection
