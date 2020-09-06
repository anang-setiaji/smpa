<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class dashboardModel extends Model
{
   protected $table = 'request';
   //disable createdate and updatedate
   public $timestamps = false;

}

?>
