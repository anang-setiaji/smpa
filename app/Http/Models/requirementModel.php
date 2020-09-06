<?php
 
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
 
class requirementModel extends Model
{
   protected $table = 'requirement';
   protected $primaryKey = 'id';
   //disable createdate and updatedate
   // public $timestamps = false;
   public function request()
  {
    return $this->belongsTo('App\Http\Models\requestModel');
  }
}

?>