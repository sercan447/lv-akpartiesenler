<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class sosyalmedyaModel extends Model
{

  protected $table = "psl_sosyalmedya";
  protected $fillable =  ["numara","facebook","instagram","twitter","googleplus",
                          "youtube","tumblr","pinterest","vimeo","linkedin","flickr","vk"];

  public $timestamps = false;                        

}
