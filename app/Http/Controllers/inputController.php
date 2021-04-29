<?php
 
namespace App\Http\Controllers;
 
use App\Http\Models\requestModel;
use App\Http\Models\requirementModel;
use App\Http\Models\AdminModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Auth;
use DB;
use Image;

class inputController extends BaseController
{
    public function request()
    {
        $name = Auth::user()->name;
        $requ = requestModel::with("requirements")->where('nama', $name)->paginate(5);
        $reqq = requirementModel::get();
        // $requ = requestModel::get();
        return view('request', ['requ' => $requ]);
    }

    public function getInput()
{
    return view('inputaplikasi');
}
 
public function simpanrequest(Request $request)
{


     
    $validatedData = $request->validate([
        'aplikasi' => 'required',
        'penjelasan' => 'required',
        'surat' =>  'required|mimes:pdf',
        'logo' =>  'required|mimes:jpeg,png,jpg,gif,svg|max:5048',
        // 'filenames' =>  'required|mimes:jpeg,png,jpg,gif,svg|max:5048',
        'admin' => 'required',
        'kontak' => 'required',
        'link' => 'required',

    ]);
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
     if ($request->file('logo')) {
        $image = $request->file('logo');

        $file_name = time(). rand(1111, 9999) . '.' .$image->getClientOriginalExtension();

        // $save_Path = 'images/'.$file_name;
        //$save_Path = public_path('images/'.$file_name);

        //Image::make($image->getRealPath())->resize(300, 236)->save($save_Path);
        $image->move('uploads',$file_name);
        \Image::make('uploads/'.$file_name)->save('uploads/'.$file_name);
    } else {
        $file_name = null;
    }
    $file = $request->file('surat');
  
    $destinationPath = 'uploads';
    $size = $file->getSize();
    $extension = $file->getClientOriginalExtension();
    $fileName = $file->getClientOriginalName();
    $upload_success = $file->move($destinationPath, $fileName);
         
    if ($upload_success){
   
            $requ = new requestModel;
            $requ->nama = $request->input('nama');
            $requ->aplikasi = $request->input('aplikasi');
            $requ->penjelasan = $request->input('penjelasan');
            $requ->status = 2;
            $requ->surat = $fileName;
            $requ->maintenance = "ACTIVE";
            $requ->link = $request->input('link');
            $requ->keterangan = $request->input('keterangan');
            $requ->users_id = Auth::user()->id;
            $requ->filenames=json_encode($data);
            $requ->admin = $request->input('admin');
            $requ->kontak = $request->input('kontak');
            $requ->logo = $file_name;

            $requ->save();

            $syarats = $request->input('syarat');
            foreach($syarats as $syarat) {
                $reqq = new requirementModel();
                $reqq->syarat = $syarat;
                $reqq->checkbox = true;
                $reqq->status = "Done";
                $reqq->request_id = $requ->id;
                $reqq->save();
            }
        }
            return redirect()->action('requestController@request')->with('style', 'success')->with('alert', 'Berhasil Disimpan ! ')->with('msg', 'Menunggu persetujuan');
        
        }
    
 
}






?>