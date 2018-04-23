<?php

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('iletisim', function () {
    return view('frontend.contact');
})->name("iletisim");
Route::get('hakkimizda', function () {
    return view('frontend.hakkimizda');
})->name("hakkimizda");
Route::get('giris', function () {
    return view('frontend.giris');
})->name("giris");
Route::get('katil', function () {
    return view('frontend.katil');
})->name("katil");
Route::post("katil","MusterilerController@mesaj_kayit")->name("katil");

Route::get('video', function () {
    return view('frontend.video');
})->name("video");
Route::get('yonetim', function () {
    return view('frontend.yonetim');
})->name("yonetim");
Route::get('admin', function () {
    return view('frontend.admin');
})->name("admin");
Route::get("haberoku/{id?}",function($id){

    $haber = App\Model\HaberlerModel::where("id",$id)->first();


    return view("frontend.haberoku")->with("haber",$haber);
})->name("haberoku");

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//PANEL ILE ILGILI ROUTE Girisleri
Route::group(["prefix"=>"yonetici","middleware"=>"auth"],function(){

    Route::get("admanasayfa",function(){
      $data["tarih"] = date("d-m-Y");
      $data["gun"] = date("d");
      $data["iletisimsayisi"] = App\Model\MusterilerModel::All()->count();
      $data["habersayisi"] = App\Model\HaberlerModel::All()->count();
      $data["kategorisayisi"] = App\Model\KategoriModel::All()->count();
      return view("backend.anasayfa",$data);
    })->name("admanasayfa");
  
    /////////////////////////////////////////////////////////////////////
  
    Route::get("admfirmabilgi","HakkimizdaController@hakkimizda_show")->name("admfirmabilgi");
    Route::post("admfirmabilgi","HakkimizdaController@hakkimizda_create")->name("admfirmabilgi");
    ///////////////////////////////////////////////////////////////////////////
    Route::get("admsosyalmedya","SosyalmedyaController@sosyalmedya_show")->name("admsosyalmedya");
    Route::post("admsosyalmedya","SosyalmedyaController@sosyalmedya_create");
    /////////////////////////////////////////////////////////
  
    Route::get("admkategoriekle","KategoriController@KategoriSayfa_GET")->name("admkategoriekle");
    Route::post("admkategoriekle","KategoriController@KategoriEkle")->name("admkategoriekle");
  
    
    ///////////////////////////////////////////////////////
    Route::get("admurunekle","UrunlerController@UrunEkle_GET")->name("admurunekle");
    Route::post("admurunekle","UrunlerController@urunler_create")->name("admurunekle");
    Route::post("urunsil","UrunlerController@urunSil")->name("urunsil");
    /////////////////////////////////
    Route::get("admmusteriler","MusterilerController@musteriler_show")->name("admmusteriler");
    Route::any("admesajoku/{id?}","MusterilerController@mesajOku")->name("admesajoku");
    //////////////////////////////////////////
  
    Route::get("admgaleri","GaleriController@Galeri_Sayfasi")->name("admgaleri"); 
    Route::post("admgaleri","galeriController@galeri_create")->name("admgaleri");
    Route::get("resimsil/{isim?}","GaleriController@resimsil")->name("resimsil"); 
    //Route::post("admgaleri","GaleriController@sercanus");
  
    /////////////////////////////////////////////////////////
    Route::get("admiletisimalani","iletisimController@iletisim_show")->name("admiletisimalani");
    Route::post("admiletisimalani","iletisimController@iletisim_create")->name("admiletisimalani");
    ////////////////////////////////////////////////////////////
    Route::get("admurunler","UrunlerController@urunler_show")->name("admurunler");
    Route::post("admurunler","UrunlerController@urunler_delete")->name("admurunler");
  
    Route::get("admurunduzenle","UrunlerController@urunler_edit")->name("admurunduzenle");
    Route::post("admurunduzenle","UrunlerController@urunler_edit_post")->name("admurunduzenle");
  
  ////////////////////////////////////
  
    Route::get("admhaberler","HaberlerController@backend_haberler_show")->name("admhaberler");
    Route::get("admhaberekle","HaberlerController@admhaber_sayfasi")->name("admhaberekle");
    Route::post("admhaberekle","HaberlerController@haberler_create")->name("admhaberekle");
    Route::get("admhabersil/{id?}","HaberlerController@haberSil")->name("admhabersil");
    ////////////////////////////////////
  Route::get("admhaberduzenle","HaberlerController@admhaber_duzenle_sayfa")->name("admhaberduzenle");
  Route::post("admhaberduzenle","HaberlerController@admhaber_edit_post")->name("admhaberduzenle");
    
    Route::get("admpersoneller","PersonelController@Personeller")->name("admpersoneller");
    Route::get("admpersonelekle","PersonelController@Sayfa_GET")->name("admpersonelekle");
    Route::post("admpersonelekle","PersonelController@PersonelEkle_POST")->name("admpersonelekle");
    Route::get("admpersonelduzenle/{id?}","PersonelController@PersonelEdit")->name("admpersonelduzenle");
    Route::post("admpersonelduzenle","PersonelController@PersonelEdit_POST")->name("admpersonelduzenle");
    Route::get("admpersonelsil/{id?}","PersonelController@PersonelSil")->name("admpersonelsil");
  
    Route::get("admvideoekle","HaberlerController@videoekle_get")->name("admvideoekle");
    Route::post("admvideoekle","HaberlerController@videoekle_post")->name("admvideoekle");
    Route::get("admvideolar","HaberlerController@videolar")->name("admvideolar");
  
    Route::get("kilitlisistem",function(){
  
      return view("backend.sistemkilitle");
    })->name("kilitlisistem");
  
    Route::post("kilitlisistem",function(Request $request){
      
      return redirect("yonetici/admanasayfa");
    })->name("kilitlisistem")->middleware("kilit");
  
  });// Route::grup



