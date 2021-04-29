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
        $prog = aplikasiModel::with("requirements")->where('status', 1)->where('admin_id', $name)->paginate(8);
        $requ = aplikasiModel::with("requirements")->where('status', 1)->orwhere('status', 2)->paginate(8);
        $reqq = requirementModel::get();
        $contacts = User::where('id', '!=', auth()->id())->get();

        // $requ = requestModel::get();
        return view('aplikasi', [
            'requ' => $requ,
            'prog' => $prog
            ]);
    }
    
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $name = Auth::user()->id;
        $cari = $request->cari;

            // mengambil data dari table pegawai sesuai pencarian data        
        $requ = aplikasiModel::with("requirements")->where('status', '1')
        ->where('nama','LIKE',"%{$cari}%")
        ->orWhere('aplikasi', 'LIKE', "%{$cari}%") 
        ->paginate(6);

        $prog = aplikasiModel::with("requirements")->where('status', 1)->where('admin_id', $name)
        ->where('nama','LIKE',"%{$cari}%")
        ->orWhere('aplikasi', 'LIKE', "%{$cari}%") 
        ->paginate(6);
 
            // mengirim data pegawai ke view index
        return view('aplikasi',['requ' => $requ, 'prog' => $prog]);
 
    }
    public function getEdit($id)
    {
        $requ     = aplikasiModel::with("requirements")->findOrFail($id);
        $pictures = json_decode($requ->filenames, true);
        
        return view('editaplikasi', ['request' => aplikasiModel::with("requirements")->findOrFail($id),'pictures' => $pictures,]);
    }
     
    public function ubahaplikasi(Request $request)
    {
     
        
        $id     = $request->input('id');
        $requ     = aplikasiModel::with("requirements")->findOrFail($id);
        $pictures = json_decode($requ->filenames, true);
        $data = [];

    if($request->hasfile('filenames'))
     {
        //  dd($request->file('filenames'));
        foreach($request->file('filenames') as $file)
        {
            $name = sha1($file->getClientOriginalName().microtime()).'.'.$file->extension();
            $file->move(public_path().'/uploads/', $name);  
            $data[] = $name;  
        }
     }
   
     if($requ->logo === null)
     {
     $file = $request->file('logo');
     
     $destinationPath = 'uploads';
     $size = $file->getSize();
     $extension = $file->getClientOriginalExtension();
     $fileName = $file->getClientOriginalName();
     $upload_success = $file->move($destinationPath, $fileName);
     $requ->aplikasi = $request->input('aplikasi');
     $requ->maintenance = $request->input('maintenance');
     $requ->alasan = $request->input('alasan');
     $requ->kapan = $request->input('kapan');
     $requ->link = $request->input('link');
     // $requ->userguide = $fileName;
     $requ->filenames = $request->input('filenames');
     $requ->logo = $fileName;
     $requ->filenames=json_encode($data);
     $requ->save();
     }
     
     else{

        $requ->aplikasi = $request->input('aplikasi');
        $requ->maintenance = $request->input('maintenance');
        $requ->alasan = $request->input('alasan');
        $requ->kapan = $request->input('kapan');
        $requ->link = $request->input('link');
        $requ->logo = $request->input('logo');
        // $requ->userguide = $fileName;
        $requ->filenames=json_encode($data);
        $requ->save();
     }    
        
         
        return redirect()->action('requestaController@requesta')->with('style', 'success')->with('alert', 'Berhasil Diubah ! ')->with('msg', 'Data Diubah Di Database');        
    }
}


?>