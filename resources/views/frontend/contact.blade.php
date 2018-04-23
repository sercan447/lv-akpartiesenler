@extends("frontend/layouts/layout")

@section("css_files")

@endsection

@section("script_files")

@endsection

@section("icerik")
@php
    $iletisim = DB::table("psl_iletisim")->first();

@endphp

<h2>İletişim Bilgileri</h2>
<h3>{{$iletisim->sirket_adi}}</h3>

<address>
   {{$iletisim->adres}} <br />
    <abbr title="Phone">P:</abbr>
   {{$iletisim->telefon}}
</address>

<address>
    <strong>E-Posta 1:</strong>   <a href="mailto:{{$iletisim->eposta1}}">{{$iletisim->eposta1}}</a><br />
    <strong>E-Posta 2 :</strong> <a href="mailto:{{$iletisim->eposta2}}">{{$iletisim->eposta2}}</a>
</address>

@endsection