<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HaberlerModel extends Model
{

    protected $table = "psl_haberler";
    protected $fillable =["id","haber_resmi","haber_baslik","haber_icerik","haber_link"];
    public $timestamps = false;
    
}
