<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\PersonelModel;
use App\Model\HaberlerModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Intervention\Image\Facades\Image;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Model\KategoriModel;
use Session;


class KategoriController extends Controller
{
    public function KategoriSayfa_GET(){
      /*if(Session::has("kilitoturum"))
      {
       return redirect("yonetici/kilitlisistem");
      }
  */
        return view("backend.urunkategoriekle")->with("sayfa","Kategori Ekle");
    }

    public function KategoriEkle(Request $request){


        $validator = Validator::make($request->all(),[
          'kategoriresmi'=>'required',
          'kategoriadi'=>'required'
        ]);

        if($validator->fails()){
          return response(["durum"=>"warning",
                           "baslik"=>"Eksik Tanımlama",
                            "icerik"=>"Baslik ,Resim yada içerik bölümünü girmediniz.Tekrar Deneyiniz."]);
        }

        try{
          if($request->has("kategoriresmi") && $request->has("kategoriadi"))
          {
            $kategoriresmi = $request->file("kategoriresmi");
            $kategoriadi = $request->input("kategoriadi");
            $aciklama = $request->has("kategoriaciklama") ? $request->input("kategoriaciklama") : "" ;  


              if(Schema::hasTable("psl_kategoriler"))
              {
                Storage::disk("kategoriuploads")->makeDirectory("kresim");

                 $uzanti =  $kategoriresmi->getClientOriginalExtension();
                 $genislik =   Image::make($kategoriresmi->getRealPath())->width();
                 $uzunluk =  Image::make($kategoriresmi->getRealPath())->height();

                 $dizin = "KategoriResimleri/kresim/".$kategoriresmi->getClientOriginalName();

               Image::make($kategoriresmi->getRealPath())->resize($genislik,$uzunluk)->save($dizin);

            $kategori = new KategoriModel;
            $kategori->resimadi = $kategoriresmi->getClientOriginalName();
            $kategori->kategori_adi = $kategoriadi;
            $kategori->kategori_aciklama = $aciklama;
            $kategori->save();
              }
        }else{
          return response(["durum"=>"warning",
                           "baslik"=>"Eksik Tanımlama",
                            "icerik"=>"Baslik ,Resim yada içerik bölümünü girmediniz.Tekrar Deneyiniz."]);
        }
        return response(["durum"=>"success",
                  "baslik"=>"Etkinlik Kayıt",
                  "icerik"=>"Başarıyla Kategori Kaydettiniz."]);

      }catch(\Exception $et){
            return response(["durum"=>"error",
                             "baslik"=>"Catch Yakaladı",
                              "icerik"=>"Hata Bölümü Devrede bakınız.".$et]);
          }finally{
           //   return redirect("yonetici/admhaberler");
          }
    }
}
