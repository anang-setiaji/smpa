<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class detailModel extends Model
{
    protected $table = 'details';
   protected $primaryKey = 'id';
   //disable createdate and updatedate
   // public $timestamps = false;
   public function request()
  {
    return $this->belongsTo('App\Http\Models\requestModel');
  }
}
