<?php
 
namespace App\Http\Controllers;

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


class requestaController extends BaseController
{
    public function requesta()
    {
        $name = Auth::user()->id;
        $requ = requestaModel::with("requirements")->paginate(5);
        $prog = requestaModel::with("requirements")->where('status', 1)->where('admin_id', $name)->paginate(5);
        $reqq = requirementModel::get();
        $contacts = User::where('id', '!=', auth()->id())->get();
        foreach($requ as $key=>$req) {
            $admin = User::where('id', $req->admin_id)->first();
            $req->admin_name = $admin ? $admin->name : null;
        }
        // $requ = requestModel::get();
        return view('requesta', [
            'requ' => $requ,
            'prog' => $prog
            ]);
    }
    public function request()
    {
        $requ = requestaModel::with("requirements")->paginate(5);
        $reqq = requirementModel::get();
        $contacts = User::where('id', '!=', auth()->id())->get();

        // $requ = requestModel::get();
        return view('requesta', ['requ' => $requ]);
    }
    public function getInput()
{
    return view('inputrequesta');
}
 
public function simpanrequesta(Request $requesta)
{
    $file = Input::file('lampiran');
 
        $destinationPath = 'uploads';
        $size = $file->getSize();
        $extension = $file->getClientOriginalExtension();
        $fileName = $file->getClientOriginalName();
        $upload_success = $file->move($destinationPath, $fileName);
         
        if ($upload_success){
            $requ = new requestaModel;
            $requ->nama = $requesta->input('nama');
            $requ->aplikasi = $requesta->input('aplikasi');
            $requ->penjelasan = $requesta->input('penjelasan');
            $requ->lampiran = $fileName;
            $requ->status = $requesta->input('status');
 
            $requ->save();

            
             
            return redirect()->action('requestaController@requesta')->with('style', 'success')->with('alert', 'Berhasil Disimpan ! ')->with('msg', 'Menunggu persetujuan');
        
        }
    
 
}

public function getEdit($id)
{
    return view('editrequesta', ['requesta' => requestaModel::with("requirements")->findOrFail($id)]);
}
 
public function ubahrequesta(Request $requesta)
{
    $requ     = new requestaModel;
    $id     = $requesta->input('id');
    $requ     = requestaModel::find($id);
     
    $requ->nama = $requesta->input('nama');
    $requ->aplikasi = $requesta->input('aplikasi');
    $requ->penjelasan = $requesta->input('penjelasan');
    $requ->lampiran = $requesta->input('lampiran');
    $requ->status = $requesta->input('status');
    $requ->countdown = $requesta->input('countdown');


    $requ->save();


     
    return redirect()->action('requestController@request')->with('style', 'success')->with('alert', 'Berhasil Diubah ! ')->with('msg', 'Data Diubah Di Database');
}

public function getDelete($id)
{
    $requ     = new requestaModel;
    $requ     = requestaModel::find($id);
    $requ->delete();
     
    return redirect()->action('requestaController@requesta')->with('style', 'success')->with('alert', 'Berhasil Dihapus ! ')->with('msg', 'Data Dihapus Di Database');
}

public function cari(Request $requesta)
    {
        // menangkap data pencarian
        $cari = $requesta->cari;
 
            // mengambil data dari table pegawai sesuai pencarian data        
        $requ = requestaModel::with("requirements")
        ->where('nama','LIKE',"%{$cari}%")
        ->orWhere('aplikasi', 'LIKE', "%{$cari}%") 
        ->paginate(5);
 
            // mengirim data pegawai ke view index
        return view('requesta',['requ' => $requ]);
 
    }
    

public function downfunc(){
    	$requ=DB::table('request')->get();
    	return view('requesta',compact('downloads'));
    }
    

}



?>