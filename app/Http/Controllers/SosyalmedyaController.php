<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SosyalmedyaModel;
use Schema;
use Session;

class SosyalmedyaController extends Controller
{

  public function __construct(){
     
  }
    public function sosyalmedya_show(){

      /*if(Session::has("kilitoturum"))
      {
       return redirect("yonetici/kilitlisistem");
      }*/
  
      if(Schema::hasTable("psl_sosyalmedya")){
        $datas["sosyalmedyatablo"] = SosyalmedyaModel::first();
        $datas["Sayfa"] = "Sosyal Medya";                                 
       }
      return view("backend.sosyalMedya",$datas);
    }//FUNC

    /////////////////////////////////////////////////////////

    public function sosyalmedya_create(Request $request){


      if(Schema::hasTable("psl_sosyalmedya")){

       
        $facebook = $request->input("facebook")  ;
        $linkedin = $request->input("linkedin")  ;
        $youtube = $request->input("youtube") ;
        $google =  $request->input("googleplus") ;
        $twitter = $request->input("twitter") ;
        $vimeo = $request->input("vimeo") ;
        $tumblr = $request->input("tumblr");
        $vk = $request->input("vk") ;
        $flickr = $request->input("flickr");
        $pinterest = $request->input("pinterest");
        $instagram = $request->input("instagram") ;

      $veriSayisi = SosyalmedyaModel::get()->count();


      if($veriSayisi == 0)
      {
      $veriEkle = new SosyalmedyaModel;
      $veriEkle->facebook = $facebook;
      $veriEkle->linkedin = $linkedin;
      $veriEkle->youtube = $youtube;
      $veriEkle->googleplus = $google;
      $veriEkle->twitter = $twitter;
      $veriEkle->vimeo = $vimeo;
      $veriEkle->tumblr = $tumblr;
      $veriEkle->vk = $vk;
      $veriEkle->flickr = $flickr;
      $veriEkle->pinterest = $pinterest;
      $veriEkle->instagram = $instagram;
      $veriEkle->save();

      }else{

      $veriGüncelle = SosyalmedyaModel::where("numara",1)
      ->update([
      "facebook"=>$facebook,
      "linkedin"=>$linkedin,
      "youtube"=>$youtube,
      "googleplus"=>$google,
      "twitter"=>$twitter,
      "vimeo"=>$vimeo,
      "tumblr"=>$tumblr,
      "vk"=>$vk,
      "flickr"=>$flickr,
      "pinterest"=>$pinterest,
      "instagram"=>$instagram]);
      }
      return response(['durum'=>'success',
      'baslik'=>'Sosyal Hesaplar',
      'icerik'=> 'Bilgileriniz Güncellendi.']);

      }//if Hastable
        return redirect("yonetici/admsosyalmedya");

    }//FUNCTION

    ///////////////////////////////////





}
