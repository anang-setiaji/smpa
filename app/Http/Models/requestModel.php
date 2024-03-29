<?php
 
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
 
class requestModel extends Model
{
   protected $table = 'request';
   //disable createdate and updatedate
   // public $timestamps = false;
   public function requirements()
    {
        return $this->hasMany('App\Http\Models\requirementModel', 'request_id');
    }
    public function details()
    {
        return $this->hasMany('App\Http\Models\detailModel', 'request_id');
    }
    public function users()
    {
      return $this->belongsTo('App\Http\Models\AdminModel');
    }
    public function admin()
    {
      return $this->belongsTo('App\Http\Models\AdminModel','admin_id');
    }
}
 
?>