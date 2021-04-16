<?php
 
namespace App\Http\Controllers;
// use Illuminate\Notifications\Notification;
use App\User;
use Illuminate\Support\Facades\Notification;
use App\Http\Models\requestModel;
use App\Http\Models\requirementModel;
use App\Http\Models\AdminModel;
use App\Http\Models\detailModel;
use App\Http\Models\picModel;
use App\Message;
use App\Events\NewMessage;
use App\Notifications\RepliedToThread;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Auth;
use DB;


class requestController extends BaseController
{
    public function request()
    {
        $name = Auth::user()->name;
        $requ = requestModel::with("requirements")->where('nama', $name)->paginate(5);
        $reqq = requirementModel::get();
        $contacts = User::where('id', '!=', auth()->id())->get();
        foreach($requ as $key=>$req) {
            $admin = User::where('id', $req->admin_id)->first();
            $req->admin_name = $admin ? $admin->name : null;
        }
        // $requ = requestModel::get();
        return view('request', ['requ' => $requ]);
    }

    public function getInput()
{
    return view('inputrequest');
}
 
public function simpanrequest(Request $request)
{
    
    
    $validatedData = $request->validate([
        'aplikasi' => 'required',
        'nama' => 'required',
        'penjelasan' => 'required',
        'lampiran' =>  'required|mimes:pdf',
        'countdown' => 'required',

    ]);

    $file = $request->file('lampiran');
 
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
            $requ->lampiran = $fileName;
            $requ->status = $request->input('status');
            $requ->keterangan = $request->input('keterangan');
            $requ->countdown = $request->input('countdown');
            $requ->users_id = Auth::user()->id;

 
            $requ->save();

            $syarats = $request->input('syarat');
            foreach($syarats as $syarat) {
                $reqq = new requirementModel();
                $reqq->syarat = $syarat;
                $reqq->checkbox = false;
                $reqq->status = "To-Do";
                $reqq->request_id = $requ->id;
                $reqq->save();
            }

            // auth()->user()->notify(new RepliedToThread($requ));
            
            $user = User::where('jabatan', '=', 'admin')->get();
            
            Notification::send($user, new RepliedToThread($requ));

            return redirect()->action('requestController@request')->with('style', 'success')->with('alert', 'Berhasil Disimpan ! ')->with('msg', 'Menunggu persetujuan');
        
        }
    
 
}

public function getEdit($id)
{
    $user = AdminModel::where('jabatan', 'programmer')->get();

    return view('editrequest', [
        'request' => requestModel::with("requirements")->with("users")->findOrFail($id),
        'user' => $user
        ]);
}
 
public function ubahrequest(Request $request)
{
    $validatedData = $request->validate([
        
        'surat' =>  'required|mimes:pdf',
       

    ]);

    $id     = $request->input('id');
    $requ     = requestModel::find($id);
    $file = $request->file('surat');
  
    $destinationPath = 'uploads';
    $size = $file->getSize();
    $extension = $file->getClientOriginalExtension();
    $fileName = $file->getClientOriginalName();
    $upload_success = $file->move($destinationPath, $fileName);
         
    if ($upload_success){
    $requ->aplikasi = $request->input('aplikasi');
    $requ->status = $request->input('status');
    $requ->keterangan = $request->input('keterangan');
    $requ->admin_id = $request->input('admin_id');
    $requ->surat = $fileName;
    $requ->admin = $request->input('admin');
    $requ->hapus = $request->input('hapus');


    $requ->save();
    
}
    $notif = User::where('jabatan', '=', 'programmer')->get();

    Notification::send($notif, new RepliedToThread($requ));

    return redirect()->action('requestaController@requesta')->with('style', 'success')->with('alert', 'Berhasil Diubah ! ')->with('msg', 'Data Diubah Di Database');
}

public function proses($id)
{
    $contacts = User::where('id', '!=', auth()->id())->get();
    $done = requirementModel::where(['status'=>'Done','request_id' => $id])->get()->count();
    $onprogress = requirementModel::where(['status'=> 'On Progress','request_id' => $id])->get()->count();
    $todo= requirementModel::where(['status' => 'To-Do', 'request_id' => $id])->get()->count();

    return view('proses', [
        'request' => requestModel::with("requirements")->with("users")->findOrFail($id),
        'done' => $done,
        'onprogress' => $onprogress,
        'todo' => $todo
        ]);
}

public function getProgress($id)
{
    return view('editprogress', ['request' => requestModel::with("requirements")->findOrFail($id)]);
}
 
public function ubahprogress(Request $request)
{
    

       $selects = $request->input('select');
        $ids = $request->input('ids');
            foreach($ids as $key => $requirement_id) {
                $reqq     = requirementModel::find($requirement_id);
                $reqq->status = $selects[$key];
                $reqq->save();
            }
     
    return redirect()->action('requestaController@requesta')->with('style', 'success')->with('alert', 'Berhasil Diubah ! ')->with('msg', 'Data Diubah Di Database');
}

public function getcomment($id)
{
    return view('comment', ['request' => requirementModel::findOrFail($id)]);
}
public function comment(Request $request)
{
    
            $id     = $request->input('id');
            $reqq = requirementModel::find($id); 
            $reqq->comment = $request->input('comment');
        
            $reqq->save();

            $notif = User::where('jabatan', '=', 'programmer')->get();
            Notification::send($notif, new RepliedToThread($reqq));


            return redirect()->action('requestController@request')->with('style', 'success')->with('alert', 'Berhasil Disimpan ! ')->with('msg', 'Komentar ditambahkan');
        
        }


public function getDelete($id)
{
    $requ     = new requestModel;
    $requ     = requestModel::find($id);
    $requ->delete();
     
    return redirect()->action('requestController@request')->with('style', 'success')->with('alert', 'Berhasil Dihapus ! ')->with('msg', 'Data Dihapus Di Database');
}

public function getcancel($id)
{
    $requ     = new requestModel;
    $requ     = requestModel::find($id);
    $requ->hapus = 0;
    $requ->save();


    return redirect()->action('requestController@request')->with('style', 'success')->with('alert', 'Tidak terhapus ! ')->with('msg', 'Data Tidak Dihapus Di Database');
}
public function reqhapus($id)
{
    $requ     = new requestModel;
    $requ     = requestModel::find($id);
    $requ->hapus = 1;
    $requ->save();


    return redirect()->action('requestaController@requesta')->with('style', 'warning')->with('alert', '')->with('msg', 'MENUNGGU PERSETUJUAN PENGHAPUSAN');
}

public function downfunc(){
    	$requ=DB::table('request')->get();
    	return view('request',compact('downloads'));
    }

    
  
    
    public function getstatus($id)
    {


        return view('editstatus', ['request' => requestModel::with("requirements")->findOrFail($id)]);

    }
     
    public function ubahstatus(Request $request)
    {

        // $validatedData = $request->validate([
        
        //     'filenames' =>  'required|mimes:jpg,png',
           
    
        // ]);
       
        $id     = $request->input('id');
        $requ     = requestModel::with("requirements")->findOrFail($id);


    if($request->hasfile('filenames'))
     {
        foreach($request->file('filenames') as $file)
        {
            $name = time().'.'.$file->extension();
            $file->move(public_path().'/uploads/', $name);  
            $data[] = $name;  
        }
     }
    
        $requ->aplikasi = $request->input('aplikasi');
        $requ->maintenance = $request->input('maintenance');
        $requ->alasan = $request->input('alasan');
        $requ->kapan = $request->input('kapan');
        $requ->link = $request->input('link');
        $requ->logo = $request->input('logo');
        $requ->userguide = $request->input('userguide');
        $requ->filenames=json_encode($data);
        $requ->save();
         
        return redirect()->action('requestController@request')->with('style', 'success')->with('alert', 'Berhasil Diubah ! ')->with('msg', 'Data Diubah Di Database');
    }
    


}



?>