<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PersonelModel extends Model
{
    protected $table = "psl_personeller";
    protected $fillable = ["numara","adisoyadi","sorumluluk","link","hakkinda","resimadi"];
    public $timestamps = false;
}
