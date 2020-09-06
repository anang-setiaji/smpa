<?php
 
namespace App\Http\Controllers;
 
use App\Http\Models\aplikasiModel;
use App\Http\Models\requirementModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Events\NewMessage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Auth;

class dashboardController extends BaseController
{
    public function dashboard()
    {
        $name = Auth::user()->id;
        $prog = aplikasiModel::with("requirements")->where('status', 1)->where('admin_id', $name)->paginate(5);
        $requ = aplikasiModel::with("requirements")->where('status', '1')->paginate(8);
        $reqq = requirementModel::get();
        $contacts = User::where('id', '!=', auth()->id())->get();
        // $requ = requestModel::get();
        return view('dashboard', [
            'requ' => $requ,
            'prog' => $prog
            ]);
    }

    
}



?>