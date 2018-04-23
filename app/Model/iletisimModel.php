<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class iletisimModel extends Model
{
    protected $table = "psl_iletisim";
    protected $fillable = ["numara","sirket_adi","adres","telefon"];
    public $timestamps = false;










}
