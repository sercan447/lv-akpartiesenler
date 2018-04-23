<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    protected $table = "psl_kategoriler";
    protected $fillable = ["numara","kategori_adi","kategori_aciklama","resimadi"];
    public $timestamps = false;

}
