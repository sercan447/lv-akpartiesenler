<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MusterilerModel extends Model
{

    protected $table = "psl_musteriler";
    protected $fillable = ["numara","adsoyad","telefon","eposta","konu","mesaj"];
    public $timestamps = true;


}
