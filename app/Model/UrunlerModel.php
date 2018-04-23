<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UrunlerModel extends Model
{
  protected $table = "psl_urunler";
  protected $fillable = [ "urun_adi",
                          "urun_kodu",
                          "urun_aciklama",
                          "urun_eklenmedurumu",
                          "stok_durumu",
                          "kategori_id",
                          "vitrin_resmi",
                          "created_at",
                          "updated_at"];

public $timestamps = false;




}
