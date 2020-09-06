<?php
 
namespace App\Http\Controllers;

use App\Http\Models\aplikasiModel;
use App\Http\Models\requestaModel;
use App\Http\Models\requirementModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Message;
use App\Events\NewMessage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Auth;

class aplikasiController extends BaseController
{
    public function aplikasi()
    {
        $name = Auth::user()->id;
        $prog = aplikasiModel::with("requirements")->where('status', 1)->where('admin_id', $name)->paginate(5);
        $requ = aplikasiModel::with("requirements")->where('status', '1')->paginate(8);
        $reqq = requirementModel::get();
        $contacts = User::where('id', '!=', auth()->id())->get();

        // $requ = requestModel::get();
        return view('aplikasi', [
            'requ' => $requ,
            'prog' => $prog
            ]);
    }
    
      
    public function getEdit($id)
    {
        return view('editaplikasi', ['aplikasi' => aplikasiModel::findOrFail($id)]);
    }
     
    public function ubahaplikasi(Request $request)
    {
     
        $requ     = new aplikasiModel;
        $id     = $request->input('id');
        $requ     = aplikasiModel::find($id);
     
        $requ->aplikasi = $request->input('aplikasi');
        $requ->maintenance = $request->input('maintenance');
        $requ->link = $request->input('link');



        $requ->save();
        
         
        return redirect()->action('aplikasiController@aplikasi')->with('style', 'success')->with('alert', 'Berhasil Diubah ! ')->with('msg', 'Data Diubah Di Database');
        
        
    }
}


?>