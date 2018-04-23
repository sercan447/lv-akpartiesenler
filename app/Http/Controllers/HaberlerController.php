<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\HaberlerModel;
use App\Model\VideoModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Intervention\Image\Facades\Image;
use Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Support\Facades\File;

class HaberlerController extends Controller
{


     public function __construct(){
        
      }
      
        public function admhaber_sayfasi(){
         /* if(Session::has("kilitoturum"))
          {
           return redirect("yonetici/kilitlisistem");
          }*/
      
            return view("backend.admhaberekle")->with("sayfa","Haber Ekle");
        }//FUNC


      public function haberler_show(){

          if(Schema::hasTable("psl_haberler")){
            $haberler_data = HaberlerModel::select("haber_resmi","haber_baslik","haber_icerik","created_at")->orderBy("id","DESC")->get();
            //  return view("frontend.haberler")->with("haberler_data",$haberler_data);
          }
          return view("frontend.haberler")->with("haberler_data",$haberler_data);
      }//FUNC

      public function backend_haberler_show(){
        if(Session::has("kilitoturum"))
        {
         return redirect("yonetici/kilitlisistem");
        }
    
          if(Schema::hasTable("psl_haberler")){
            $haberler_data = HaberlerModel::select("id","haber_resmi","haber_baslik","haber_icerik","created_at")->orderBy("id","DESC")->paginate(9);
            //  return view("frontend.haberler")->with("haberler_data",$haberler_data);
          }
          return view("backend.admhaberler")->with("haberler_data",$haberler_data);
      }//FUNC

      public function haberler_create(Request $request){

       $haber_resmi = null;
        $haber_baslik = null;
        $haber_icerik = null;

        $validator = Validator::make($request->all(),[
          'haberresmi'=>'required',
          'haberbaslik'=>'required',
          'habericerigi'=>'required'
        ]);

        if($validator->fails()){
          return response(["durum"=>"warning",
                           "baslik"=>"Eksik Tanımlama",
                            "icerik"=>"Baslik ,Resim yada içerik bölümünü girmediniz.Tekrar Deneyiniz."]);
        }

        try{
          if($request->has("haberresmi") && $request->has("haberbaslik") && $request->has("habericerigi"))
          {
            $haber_resmi = $request->file("haberresmi");
            $haber_baslik = $request->input("haberbaslik");
            $haber_icerik = $request->input("habericerigi");  
            $haber_link = $request->input("haberlink");

              if(Schema::hasTable("psl_haberler"))
              {
                Storage::disk("haberuploads")->makeDirectory("hresim");

                 $uzanti =  $haber_resmi->getClientOriginalExtension();
                 $genislik =   Image::make($haber_resmi->getRealPath())->width();
                 $uzunluk =  Image::make($haber_resmi->getRealPath())->height();

                 $dizin = "HaberResimleri/hresim/".$haber_resmi->getClientOriginalName();

               Image::make($haber_resmi->getRealPath())->resize($genislik,$uzunluk)->save($dizin);

            $haber_insert = new HaberlerModel;
            $haber_insert->haber_resmi = $haber_resmi->getClientOriginalName();
            $haber_insert->haber_baslik = $haber_baslik;
            $haber_insert->haber_icerik = $haber_icerik;
            $haber_insert->haber_link = $haber_link;
            $haber_insert->save();
              }
        }else{
          return response(["durum"=>"warning",
                           "baslik"=>"Eksik Tanımlama",
                            "icerik"=>"Baslik ,Resim yada içerik bölümünü girmediniz.Tekrar Deneyiniz."]);
        }
        return response(["durum"=>"success",
                  "baslik"=>"Etkinlik Kayıt",
                  "icerik"=>"Başarıyla Etkinliklerinizi Kaydettiniz."]);

      }catch(\Exception $et){
            return response(["durum"=>"error",
                             "baslik"=>"Catch Yakaladı",
                              "icerik"=>"Hata Bölümü Devrede bakınız.".$et]);
          }finally{
           //   return redirect("yonetici/admhaberler");
          }

      //    return $request->input("haberbaslik")."-".$request->input("habericerigi");
      }//METHOD

        public function admhaber_duzenle_sayfa(){
            try{
                if(Input::has("haberDuzenle") )
                {
                  $haber_id = Input::get("haberDuzenle");
                  $haber_cek = HaberlerModel::where("id","=",$haber_id)->first();
                }
            }catch(\Exception $ext){

            }finally{

            }
          return view("backend.admhaberduzenle")->with("haber_edit",$haber_cek);
        }

//////////////////////////////////////

      public function admhaber_edit_post(Request $request){
        $resimadi = $request->has("resimvarmi") ? $request->get("resimvarmi") : "" ;
        try{
  
          $validator = Validator::make($request->all(),[
             'haberbaslik'=>'required'
           ]);
  
           if($validator->fails()){
             return response(["durum"=>"warning",
                              "baslik"=>"Eksik Tanımlama",
                               "icerik"=>"Personel Baslik ,Resim yada içerik bölümünü girmediniz.Tekrar Deneyiniz."]);
                              }
         
          if($request->has("guncelleme_id"))
          {
            $haberbaslik = $request->input("haberbaslik");
            $habericerik = $request->input("habericerigi");
  
            if($request->hasFile("haberresmi"))
            {
              $resmi = $request->file("haberresmi");
              if(trim($resimadi) != null || $resimadi != "")
              {
                File::delete("HaberResimleri/hresim/".$resimadi);
              }
                  Storage::disk("haberuploads")->makeDirectory("hresim");
    
                   $uzanti =  $resmi->getClientOriginalExtension();
                   $genislik =   Image::make($resmi->getRealPath())->width();
                   $uzunluk =  Image::make($resmi->getRealPath())->height();
    
                   $dizin = "HaberResimleri/hresim/".$resmi->getClientOriginalName();
    
                 Image::make($resmi->getRealPath())->resize($genislik,$uzunluk)->save($dizin);
    
                 $resimadi = $resmi->getClientOriginalName();
  
            }else{
              $resimadi = $request->has("resimvarmi") ? $request->get("resimvarmi") : "" ;
            }
          HaberlerModel::where("id",$request->get("guncelleme_id"))
                              ->update(["haber_baslik"=>$haberbaslik,
                                        "haber_icerik"=>$habericerik,
                                        "haber_resmi"=>$resimadi]);    
          }//GUNCELLE
         
        }catch(\Exception $et){
          return response(["durum"=>"error",
                        "baslik"=>"Catch Yakaladı",
                        "icerik"=>"Hata Bölümü Devrede bakınız."]);
        }finally{
          return response(["durum"=>"success",
                           "baslik"=>"Haber Kayıt işlemi",
                           "icerik"=>"Başarıyla Haberler Güncellendi."]); 
        }
         

      }//FUNC END


      public function haberSil($id)
      {
        try{ 
          $haber = HaberlerModel::where("id",$id)->first();
          File::delete("HaberResimleri/hresim/".$haber->haber_resmi);
  
          HaberlerModel::where("id",$id)->delete();
    
          return redirect("/yonetici/admhaberler");
        }catch(\Exception $et)
        {
          return view("backend.hatabilgilendirme")->with("tespit",$et->Message);
    
        }finally{
    
        }
      }//FUNC


      public function videoekle_get()
      {

        return view("backend.admvideo");
      }

      public function videoekle_post(Request $request)
      {

        $valid = Validator::make($request->all(),
        [
          "videoad"=>"required",
          "videolink"=>"required"
        ]);

        if($valid->fails())
        {
          return response(["durum"=>"warning",
                     "baslik"=>"Eksik Tanımlama",
                   "icerik"=>"Eksik veya hatalı girdiniz lütfen baştan deneyiniz."]);
        }else{
          VideoModel::create(["videoadi"=>$request->get("videoad"),
                              "videolink"=>$request->get("videolink")]);

                              return response(["durum"=>"success",
                                             "baslik"=>"Başarılı",
                                             "icerik"=>"Kayıt İşlemi Gerçekleştirilmiştir."]);
        }    
     //   return view("backend.admvideo");
      }//METHOD

      public function videolar()
      {
        $datas["videolar"] = VideoModel::All();

        return view("backend.admvideolar",$datas);
      }
}
