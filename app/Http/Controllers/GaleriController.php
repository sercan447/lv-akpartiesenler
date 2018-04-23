<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Session;
use Illuminate\Support\Facades\File;


class GaleriController extends Controller
{

public function __construct(){
   
}

public function resimsil($isim)
{
  File::delete("GaleriResimleri/gresim/".$isim);
  return response(["durum"=>"info",
                      "baslik"=>"Resimler",
                      "icerik"=>"Seçili Resim Silindi"]);
}
public function Galeri_Sayfasi(){
        /*if(Session::has("kilitoturum"))
          {
           return redirect("yonetici/kilitlisistem");
          }
          */
  return view("backend.admgaleri")->with("sayfa","Galeri");
}
///////////////////////////////////////////////////////////
    public function galeri_create(Request $request){
      try{

        $resim = Input::file("galeriresim");

        if(empty($resim)){
        return response(["durum"=>"warning",
                         "baslik"=>"Kayıt Durumu",
                          "icerik"=>"Resim Eklemeyi Unuttunuz.."]);
      }


      $i = 0;
        foreach($resim as $file){
          $i++;
          Storage::disk("galeriuploads")->makeDirectory("gresim");

           $uzanti =  $file->getClientOriginalExtension();
           $genislik =  Image::make($file->getRealPath())->width();
           $uzunluk =  Image::make($file->getRealPath())->height();

           $dizin = "GaleriResimleri/gresim/".$file->getClientOriginalName()."-$i.$uzanti";

         Image::make($file->getRealPath())->resize($genislik,$uzunluk)->save($dizin);
      }//foreach


    //Storage::disk("uploads")->makeDirectory("img");
    //Image::make($resim->getRealPath())->resize(222,200)->save("yuklenen/img/logos.png");

   /* return response(['durum'=>'success',
    'baslik'=>'Resimler Galeriye Kaydedildi.',
       'icerik'=> 'Kayıt Tamamlandı.']);
*/

      }catch(\Exception $et){

        /*return response(['durum'=>'error',
        'baslik'=>'Hata',
        'icerik'=> ' veri : '.$et]);
        */
      }finally{

        return redirect("yonetici/admgaleri");
      }
       
    
    }//function
    ///////////////////////////////
}
