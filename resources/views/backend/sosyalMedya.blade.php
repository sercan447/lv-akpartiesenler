@extends("backend.sablon/varsayilan")

@section("cssler")
<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css') }}">
<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2-bootstrap.css') }}">
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
			alert("HATALANDI :"+hata);
	}
});
});
</script>
@endsection

@section("icerik")
<div class="container">
		{{Form::open(array("url"=>"yonetici/admsosyalmedya"))}}
<div class="row">

		

        <div class="col-lg-12">

								<div class="form-group">
									<div class="col-sm-9">
										<div class="input-group input-group-lg">
											<a href="{{$sosyalmedyatablo->facebook}}" class="input-group-addon btn btn-default btn-lg btn-flat btn-facebook background">
											<i class="fa fa-facebook"></i>
										</a>
											<input type="text" name="facebook" value="{{$sosyalmedyatablo->facebook}}" class="form-control"  placeholder="Facebook Hesabı" >
										</div>
									</div>
								</div>

                    <div class="form-group">
                      <div class="col-sm-9">
                        <div class="input-group input-group-lg">
                          <a  href="{{$sosyalmedyatablo->linkedin}}" class="input-group-addon btn btn-default btn-lg btn-flat btn-linkedin background">
                            <i class="fa fa-linkedin"></i>
                          </a>
                          <input type="text" name="linkedin" value="{{$sosyalmedyatablo->linkedin}}" class="form-control" placeholder="Linkedin Hesabı">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-9">
                        <div class="input-group input-group-lg">
                          <a href="{{$sosyalmedyatablo->youtube}}" class="input-group-addon btn btn-default btn-lg btn-flat btn-youtube background">
                            <i class="fa fa-youtube"></i>
                          </a>
                          <input type="text" name="youtube" value="{{$sosyalmedyatablo->youtube}}" class="form-control" placeholder="Youtube Hesabı">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-9">
                        <div class="input-group input-group-lg">
                          <a href="{{$sosyalmedyatablo->googleplus}}" class="input-group-addon btn btn-default btn-lg  btn-flat btn-google-plus background">
                            <i class="fa fa-google-plus"></i>
                          </a>
                          <input type="text" name="googleplus" value="{{$sosyalmedyatablo->googleplus}}"  class="form-control" placeholder="Google Hesabı">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-9">
                        <div class="input-group input-group-lg">
                          <a href="{{$sosyalmedyatablo->twitter}}" class="input-group-addon btn btn-default btn-lg btn-flat btn-twitter background">
                            <i class="fa fa-twitter"></i>
                          </a>
                          <input type="text"  name="twitter" value="{{$sosyalmedyatablo->twitter}}" class="form-control" placeholder="Twitter Hesabı">
                        </div>
                      </div>
                    </div>
										<div class="form-group">
											<div class="col-sm-9">
												<div class="input-group input-group-lg">
													<a href="{{$sosyalmedyatablo->vimeo}}" class="input-group-addon btn btn-default btn-lg btn-flat btn-vimeo-square background">
                            <i class="fa fa-vimeo-square"></i>
                          </a>
													<input type="text" name="vimeo"  value="{{$sosyalmedyatablo->vimeo}}" class="form-control" placeholder="Vimeo Hesabı">
												</div>
											</div>
										</div>
                    <div class="form-group">
											<div class="col-sm-9">
												<div class="input-group input-group-lg">
													<a href="{{$sosyalmedyatablo->tumblr}}" class="input-group-addon btn btn-default btn-lg btn-flat btn-tumblr background">
                            <i class="fa fa-tumblr"></i>
                          </a>
													<input type="text" name="tumblr" value="{{$sosyalmedyatablo->tumblr}}" class="form-control" placeholder="Tumblr Hesabı">
												</div>
											</div>
										</div>
                    <div class="form-group">
											<div class="col-sm-9">
												<div class="input-group input-group-lg">
													<a href="{{$sosyalmedyatablo->vk}}" class="input-group-addon btn btn-default btn-lg btn-flat btn-vk background">
                            <i class="fa fa-vk"></i>
                          </a>
													<input type="text" name="vk"  value="{{$sosyalmedyatablo->vk}}" class="form-control" placeholder="VK Hesabı">
												</div>
											</div>
										</div>
                    <div class="form-group">
											<div class="col-sm-9">
												<div class="input-group input-group-lg">
													<a href="{{$sosyalmedyatablo->flickr}}" class="input-group-addon btn btn-default btn-lg btn-flat btn-flickr background">
                            <i class="fa fa-flickr"></i>
                          </a>
													<input type="text" name="flickr" value="{{$sosyalmedyatablo->flickr}}" class="form-control" placeholder="Flicr">
												</div>
											</div>
										</div>
                    <div class="form-group">
											<div class="col-sm-9">
												<div class="input-group input-group-lg">
													<a href="{{$sosyalmedyatablo->pinterest}}" class="input-group-addon btn btn-default btn-lg btn-flat btn-pinterest background">
                            <i class="fa fa-pinterest"></i>
                          </a>
													<input type="text" name="pinterest" value="{{$sosyalmedyatablo->pinterest}}" class="form-control" placeholder="Pinterest hesabı">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-9">
												<div class="input-group input-group-lg">
													<a href="{{$sosyalmedyatablo->instagram}}" class="input-group-addon btn btn-default btn-lg btn-flat btn-twitter background">
														<i class="fa fa-instagram" aria-hidden="true"></i>
													</a>
													<input type="text" name="instagram" value="{{$sosyalmedyatablo->instagram}}" class="form-control"  placeholder="Instagram">
												</div>
											</div>
										</div>
											<div class="col-sm-4">
														{{Form::submit("Bilgi Kaydet",array("class"=>"form-control btn btn-success"))}}
											</div>

                </div>
								</div>
								{{Form::close()}}
              </div>


</div>
@endsection
