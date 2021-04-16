<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class picModel extends Model
{
    protected $table = 'pic';
    protected $primaryKey = 'id';
    //disable createdate and updatedate
    // public $timestamps = false;
    public function details()
   {
     return $this->belongsTo('App\Http\Models\detailModel');
   }
}
