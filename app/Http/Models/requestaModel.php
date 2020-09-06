<?php
 
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
 
class requestaModel extends Model
{
   protected $table = 'request';
   //disable createdate and updatedate
   // public $timestamps = false;
   public function requirements()
    {
        return $this->hasMany('App\Http\Models\requirementModel', 'request_id');
    }
}
?>