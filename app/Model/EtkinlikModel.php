<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EtkinlikModel extends Model
{
    protected $table = "psl_etkinlikler";
    protected $fillable = ["numara","etkinlik_adi","etkinlik_aciklama","etk_link"];
    public $timestamps = true;
}
