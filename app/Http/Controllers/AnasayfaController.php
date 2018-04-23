<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\MusterilerModel;
use App\Model\iletisimModel;
use App\Model\HakkimizdaModel;
use App\Model\HaberlerModel;
use App\Model\SosyalmedyaModel;
use App\Model\PersonelModel;
use App\Model\KategoriModel;
class AnasayfaController extends Controller
{

     public function Anasayfa() {
        
        $datas["bilgi"] = iletisimModel::first();
        $datas["hakkimda"] = HakkimizdaModel::first();
        $datas["etkinlikler"] = HaberlerModel::limit(2)->orderBy("id","DESC")->get();
        $datas["sosyalmedya"]= SosyalmedyaModel::first();
        $datas["personeller"] = PersonelModel::limit(4)->orderBy("numara","DESC")->get();
        $datas["kategoriler"] = KategoriModel::all();
         return view('frontend/anasayfa',$datas);
     }
   
    public function Musteristek(Request $request){

        $telefon = $request->has("telefon") ? $request->get("telefon") : "";
        $mesaj = $request->has("mesaj") ? $request->get("mesaj") : "";

        
    MusterilerModel::create(["adsoyad"=>$request->get("isimsoyisim"),
                             "telefon"=>$telefon,   
                             "eposta"=>$request->get("eposta"),
                             "konu" =>$request->get("konu"),
                             "mesaj"=>$mesaj]);
    
      return redirect('/');
    // return response(["durum"=>"success","baslik"=>"Haber Kayıt","icerik"=>"Başarıyla Haberlerinizi Kaydettiniz."]);

    }

    
}
