<?php

namespace App\Http\Controllers;

use App\Model\HakkimizdaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

use Validator;
use Session;



class HakkimizdaController extends Controller
{

  public function __construct(){
      
  }

  public function frontend_hakkimizda_show(){

      $hakkimizda_data=null;
        try{

          if(Schema::hasTable("psl_hakkimizda")){
              $hakkimizda_data = HakkimizdaModel::select("vizyon_baslik","vizyon_aciklama","tarih_baslik","tarih_aciklama")->get();
          }
        }catch(\Exception $exp){

        }finally{

        }
         return view('frontend.hakkimizda')->with("bilgiler",$hakkimizda_data);
  }//METHOD

    public function hakkimizda_show(){
       /* 
        if(Session::has("kilitoturum"))
        {
         return redirect("yonetici/kilitlisistem");
        }*/
    
        if(Schema::hasTable("psl_hakkimizda")){
            $datas["show_data"] = HakkimizdaModel::select("vizyon_baslik","vizyon_aciklama",
            "tarih_baslik","tarih_aciklama")->first();
            $datas["sayfa"] ="Hakkimizda";
        }

        return view("backend.hakkimizda",$datas);
    }

    public function hakkimizda_create(Request $request){


        $vizyon_baslik    =   $request->input("vizyon_baslik");
        $vizyon_aciklama  =   $request->input("vizyon_aciklama");
        $tarihce_baslik   =   $request->input("tarihce_baslik");
        $tarihce_aciklama =   $request->input("tarihce_aciklama");

        $validator = Validator::make($request->all(),[
          'vizyon_baslik' =>   'required',
          'vizyon_aciklama' => 'required',
          'tarihce_baslik' =>  'required',
          'tarihce_aciklama'=> 'required',
        ]);

        if($validator->fails()){
          return response(["durum"=>"warning",
                           "baslik"=>"Eksik Tanımlama",
                            "icerik"=>"Baslik ,yada içerik bölümlerini eksik girdiniz.Tekrar Deneyiniz."]);
        }

        if(Schema::hasTable("psl_hakkimizda")) {
            $sayi = HakkimizdaModel::get()->count();

           if($sayi  == 0 ) {
               $hakkimizdaTablo = new HakkimizdaModel;
               $hakkimizdaTablo->vizyon_baslik = $vizyon_baslik;
               $hakkimizdaTablo->vizyon_aciklama = $vizyon_aciklama;
               $hakkimizdaTablo->tarih_baslik = $tarihce_baslik;
               $hakkimizdaTablo->tarih_aciklama = $tarihce_aciklama;
               $hakkimizdaTablo->save();
           }else{
               $sutuns = array("vizyon_baslik"=>$vizyon_baslik,
                               "vizyon_aciklama"=>$vizyon_aciklama,
                               "tarih_baslik"=>$tarihce_baslik,
                               "tarih_aciklama"=>$tarihce_aciklama);

               $Guncelleme = HakkimizdaModel::where("numara",">","0")->update($sutuns);

               return response(['durum'=>'success',
                   'baslik'=>'Bllgi Durumu',
                   'icerik'=> 'Bilgileriniz Güncellendi.']);
           }
        }

          return response(['durum'=>'success',
              'baslik'=>'Bilgileriniz Kayıt Edilmiştir.',
              'icerik'=> 'Bilgileriniz Kayıt Edilmiştir']);

    }//function

    /////////////////////////////////
}
