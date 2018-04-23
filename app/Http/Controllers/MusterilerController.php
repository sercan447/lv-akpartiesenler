<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Schema;
use App\Model\MusterilerModel;
use Session;
use Validator;


class MusterilerController extends Controller
{

    public function __construct(){
       
    }


    public function musteriler_show(){
        /*if(Session::has("kilitoturum"))
        {
         return redirect("yonetici/kilitlisistem");
        }*/
    
          $musteriler_data = null;
      try{

          if(Schema::hasTable("psl_musteriler"))
          {
              $musteriler_data = MusterilerModel::select("numara","adsoyad","telefon","eposta","mesaj","created_at")
                                                  ->orderBy("numara","asc")
                                                  ->get();
          }


      }catch(\Exception $et){
          return "MUSTERI TABLO HATASI";
      }finally{

      }
      return view("backend.musteriler")->with("musteriler_data",$musteriler_data);
    }//FUNC

    public function mesajOku($id=null)
    {
        $data["musteriayrinti"] = MusterilerModel::where("numara",$id)->first();
        return view("backend.admesajoku",$data);
    }


    public function mesaj_kayit(Request $request)
    {
      $valid = Validator::make($request->all(),
                        [
                            "adsoyad"=>"required",
                            "eposta"=>"required",
                            "konu"=>"required",
                            "mesaj"=>"required"
                        ]);


        if($valid->fails())
        {
            return response(["durum"=>"warninig",
                                    "baslik"=>"Hatalı Kayıt",
                                         "icerik"=>"Eksik veya Hatalı girdiniz.Lütfen Baştan deneyiniz."]); 
        }else{
            MusterilerModel::create(["adsoyad"=>$request->get("adsoyad"),
                                     "telefon"=>$request->get("telefon"),
                                     "eposta"=>$request->get("eposta"),
                                     "konu"=>$request->get("konu"),
                                     "mesaj"=>$request->get("mesaj")]);

                return response(["durum"=>"success",
                                     "baslik"=>"Mesaj İleti",
                                     "icerik"=>"Başarıyla Mesajınız iletilmiştir."]); 
        }             

    }//END FUNCTION
}
