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
   
            $requ = new requestModel;
            $requ->nama = $request->input('nama');
            $requ->aplikasi = $request->input('aplikasi');
            $requ->penjelasan = $request->input('penjelasan');
            $requ->status = true;
            $requ->maintenance = "ACTIVE";
            $requ->link = $request->input('link');
            $requ->keterangan = $request->input('keterangan');
            $requ->users_id = Auth::user()->id;

 
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

            return redirect()->action('requestController@request')->with('style', 'success')->with('alert', 'Berhasil Disimpan ! ')->with('msg', 'Menunggu persetujuan');
        
        }
    
 
}






?>