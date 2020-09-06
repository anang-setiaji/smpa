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

class skpdController extends BaseController
{
    public function skpd()
    {
        $name = Auth::user()->name;
        $requ = requestModel::with("requirements")->where('nama', $name)->paginate(5);
        $reqq = requirementModel::get();
        $adm = AdminModel::get();

        // $requ = requestModel::get();
        return view('skpd', ['requ' => $requ]);
    }

    


}



?>
