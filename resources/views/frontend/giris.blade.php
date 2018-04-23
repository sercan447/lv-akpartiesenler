@extends("frontend/layouts/layout")

@section("css_files")
<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
    <link href="{{ asset('frontend/css/as.css') }}" rel="stylesheet" />

@endsection

@section("script_files")

@endsection

@section("icerik")


   
    

        <form action="~/Home/Giris" method="post" class="form-signin">
            <h2 class="form-signin-heading">GİRİŞ YAPIN</h2>


            <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
            <input type="password" class="form-control" name="password" placeholder="Password" required="" />
          
            <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş</button>
        </form>



@endsection