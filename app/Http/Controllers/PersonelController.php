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
use Session;
use Illuminate\Support\Facades\File;

class PersonelController extends Controller
{
    public function Sayfa_GET()
    {
      /*if(Session::has("kilitoturum"))
      {
       return redirect("yonetici/kilitlisistem");
      }*/
  
        return view("backend.admpersonelekle");
    }//END

    public function Personeller()
    { 
      $data["personeller"] = PersonelModel::paginate(9);

      return view("backend.personeller",$data);
    }

    public function PersonelEdit($id=null)
    {
      try{
        if(Input::has("personelDuzenle") )
        {
          $personel_id = Input::get("personelDuzenle");
          $personel_cek = PersonelModel::where("numara","=",$personel_id)->first();
        }

        return view("backend.admpersonelduzenle")->with("personel_edit",$personel_cek);
    }catch(\Exception $ext){

    }finally{

    }
          
    }//FUNCD END
    
    public function PersonelEdit_POST(Request $request)
    {
      $resimadi = $request->has("resimvarmi") ? $request->get("resimvarmi") : "" ;
      try{

        $validator = Validator::make($request->all(),[
           'adisoyadi'=>'min:3'
         ]);

         if($validator->fails()){
           return response(["durum"=>"warning",
                            "baslik"=>"Eksik Tanımlama",
                             "icerik"=>"Personel Baslik ,Resim yada içerik bölümünü girmediniz.Tekrar Deneyiniz."]);
         }
       
        if($request->has("guncelleme"))
        {
          $adisoyadi = $request->input("adisoyadi");
          $sorumluluk = $request->input("sorumluluk");
          $link = $request->has("link") ? $request->input("link") : "";
          $hakkinda = $request->has("hakkinda") ? $request->input("hakkinda") : "";

          if($request->hasFile("personelresmi"))
          {
            $resmi = $request->file("personelresmi");

            if(trim($resimadi) != null || $resimadi != "")
            {
              File::delete("PersonelResimleri/presim/".$resimadi);
            }

                Storage::disk("personeluploads")->makeDirectory("presim");
  
                 $uzanti =  $resmi->getClientOriginalExtension();
                 $genislik =   Image::make($resmi->getRealPath())->width();
                 $uzunluk =  Image::make($resmi->getRealPath())->height();
  
                 $dizin = "PersonelResimleri/presim/".$resmi->getClientOriginalName();
  
               Image::make($resmi->getRealPath())->resize($genislik,$uzunluk)->save($dizin);
  
               $resimadi = $resmi->getClientOriginalName();
               
              
          }else{
            $resimadi = $request->has("resimvarmi") ? $request->get("resimvarmi") : "" ;
          }
      
        PersonelModel::where("numara",$request->get("guncelleme"))
                            ->update(["adisoyadi"=>$request->get("adisoyadi"),
                                      "link"=>$request->get("link"),
                                      "sorumluluk"=>$request->get("sorumluluk"),
                                      "hakkinda"=>$request->get("hakkinda"),
                                      "resimadi"=>$resimadi]);    
        }//GUNCELLE
       
      }catch(\Exception $et){
        return response(["durum"=>"error",
                      "baslik"=>"Catch Yakaladı",
                      "icerik"=>"Hata Bölümü Devrede bakınız."]);
      }finally{
        return response(["durum"=>"success",
        "baslik"=>"Personel Kayıt işlemi",
      "icerik"=>"Başarıyla Personeli Kaydettiniz."]);   
      }
       
    }//FUNC END

    public function PersonelEkle_POST(Request $request){

        $validator = Validator::make($request->all(),[
         // 'resmi'=>'required',
          'adisoyadi'=>'required',
         // 'sorumluluk'=>'required'
        ]);

        if($validator->fails()){
          return response(["durum"=>"warning",
                           "baslik"=>"Eksik Tanımlama",
                            "icerik"=>"Baslik ,Resim yada içerik bölümünü girmediniz.Tekrar Deneyiniz."]);
        }

        try{
          if($request->has("resmi") /*&& $request->has("adisoyadi") && $request->has("sorumluluk")*/)
          {
            $resmi = $request->file("resmi");
            $adisoyadi = $request->input("adisoyadi");
            $sorumluluk = $request->input("sorumluluk");
            $link = $request->has("link") ? $request->input("link") : "";
            $hakkinda = $request->has("hakkinda") ? $request->input("hakkinda") : "";

              if(Schema::hasTable("psl_personeller"))
              {
                Storage::disk("personeluploads")->makeDirectory("presim");

                 $uzanti =  $resmi->getClientOriginalExtension();
                 $genislik =   Image::make($resmi->getRealPath())->width();
                 $uzunluk =  Image::make($resmi->getRealPath())->height();

                 $dizin = "PersonelResimleri/presim/".$resmi->getClientOriginalName();

               Image::make($resmi->getRealPath())->resize($genislik,$uzunluk)->save($dizin);
                           
                    $personel = new PersonelModel;
                    $personel->adisoyadi = $adisoyadi;
                    $personel->sorumluluk = $sorumluluk;
                    $personel->link = $link;
                    $personel->hakkinda = $hakkinda;
                    $personel->resimadi = $resmi->getClientOriginalName();
                    $personel->save();
                  
              }
        }else{
          return response(["durum"=>"warning",
                           "baslik"=>"Eksik Tanımlama",
                            "icerik"=>"Baslik ,Resim yada içerik bölümünü girmediniz.Tekrar Deneyiniz."]);
        }
        return response(["durum"=>"success",
                      "baslik"=>"Personel Kayıt",
                      "icerik"=>"Başarıyla Personeli Kaydettiniz."]);
        
      }catch(\Exception $et){
            return response(["durum"=>"error",
                             "baslik"=>"Catch Yakaladı",
                              "icerik"=>"Hata Bölümü Devrede bakınız.".$et]);
          }finally{
          //   return redirect("yonetici/admhaberler");
          }
    }//METHOD END


    public function PersonelSil($id)
    {
      try{ 
        $personel = PersonelModel::where("numara",$id)->first();
        File::delete("PersonelResimleri/presim/".$personel->resimadi);

        PersonelModel::where("numara",$id)->delete();
  
        return redirect("/yonetici/admpersoneller");
      }catch(\Exception $et)
      {
        return view("backend.hatabilgilendirme")->with("tespit",$et->Message);
  
      }finally{
  
      }
    }
}
