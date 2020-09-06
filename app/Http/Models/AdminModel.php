<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AdminModel extends Model
{
    use Notifiable;
   protected $table = 'users';
   //disable createdate and updatedate
   public $timestamps = false;
   public function requests()
   {
       return $this->hasMany('App\Http\Models\requestModel', 'users_id');
   }
}

?>
