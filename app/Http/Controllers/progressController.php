<?php
 
namespace App\Http\Controllers;
 
use App\Http\Models\requestModel;
use App\Http\Models\requirementModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Auth;
use DB;

class progressController extends BaseController
{
    public function progress()
    {
        $contacts = User::where('id', '!=', auth()->id())->get();
        $name = Auth::user()->name;
        $requ = requestModel::with("requirements")->where('nama', $name)->paginate(5);
        $reqq = requirementModel::get();
        // $requ = requestModel::get();
        return view('progress', ['requ' => $requ]);
    }

}

?>