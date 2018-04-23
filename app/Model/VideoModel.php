<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    
  protected $table = "videolar";
  protected $fillable =  ["id","videoadi","videolink"];

  public $timestamps = false; 
}
