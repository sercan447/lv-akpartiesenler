<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\iletisimModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Model\MusterilerModel;
use Session;

class iletisimController extends Controller
{

    public function __construct(){
      
    }

    public function frontend_bizeulasin_create(Request $request){
  try{

      $validator = Validator::make($request->all(), [
        'ad'=>'required',
        'soyad'=>'required',
        'eposta'=>'required|email',
        'telefon'=>'required|min:11',
        'mesaj'=> 'required'
    ]);

    if ($validator->fails()) {
      return response(["durum"=>"warning",
                       "baslik"=>"Boş alan",
                        "icerik"=>"Boş alanlaı doldurunuz."]);
    }

    if(Input::has("ad") && Input::has("soyad") && Input::has("eposta") && Input::has("telefon") && Input::has("mesaj")){

        MusterilerModel::create($request->all());
    }
  }catch(\Exception $exp){
    return response(["durum"=>"warning",
                     "baslik"=>"Hata Tespiti",
                      "icerik"=>"Catch Bölümünde hata yakalandı.".$exp]);
  }finally{

  }
    return view("frontend.bizeulasin");
  }//FUNC

    public function frontend_bizeulasin_show(){
          return view("frontend/bizeulasin");
    }//METHODU

    public function frontend_iletisim_show(){
      $iletisim_data = null;
        try{
          $iletisim_data = iletisimModel::select("sirket_adi","adres","telefon")->get();

        }catch(\Exception $expt){

        }finally{
          return view("frontend.iletisim")->with("iletisim_data",$iletisim_data);
        }

    }//METHOD

    public function iletisim_show(){

      /*if(Session::has("kilitoturum"))
      {
       return redirect("yonetici/kilitlisistem");
      }*/
  
      $datas["tablo_iletisim"] = iletisimModel::select("numara","sirket_adi","adres","telefon")->first();
      $datas["sayfa"] = "İletişim Bilgileri";
      return view("backend.admiletisimalani",$datas);
    }//FUNC

///////////////////////////////////////////////////

  public function iletisim_create(){


      $sirketadi = Input::get("sirketadi");
      $adres = Input::get("adres");
      $telefon = Input::get("telefon");
      $eposta1 = Input::get("eposta1");
      $eposta2 = Input::get("eposta2");

    if(Schema::hasTable("psl_iletisim")){
      $veriSayisi =   iletisimModel::get()->count();

        if($veriSayisi > 0){
          $sutuns = array("sirket_adi"=>$sirketadi,
                          "adres"=>$adres,
                          "telefon"=>$telefon,
                          "eposta1"=>$eposta1,
                          "eposta2"=>$eposta2);
          $iletisim_guncelle = iletisimModel::where("numara",">","0")->update($sutuns);

          return response(["durum"=>"success",
          "baslik"=>"Güncelleme",
           "icerik"=>"Verileriniz Başarıyla Güncellendi."]);

        }else{
        $iletisimtablo_Ekle = new iletisimModel;
        $iletisimtablo_Ekle->sirket_adi = $sirketadi;
        $iletisimtablo_Ekle->adres = $adres;
        $iletisimtablo_Ekle->telefon = $telefon;
        $iletisimtablo_Ekle->save();
        return response(["durum"=>"success",
                  "baslik"=>"Ekeleme",
                "icerik"=>"Verileriniz Başarıyla Eklendi."]);
    }
      }//if hasTable
      return redirect("yonetici/admiletisimalani");


  }//function

}
