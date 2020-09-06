<?php

namespace App\Http\Controllers;

use App\Http\Models\profileModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;

class proskpdController extends BaseController
{
    public function proskpd()
    {
        $requ = profileModel::paginate(1);
        // $requ = profileModel::get();
        return view('proskpd', ['requ' => $requ]);
    }

    public function getInput()
{
    return view('inputproskpd');
}

public function simpanproskpd(Request $request)
{
    $file = Input::file('foto');
    $valfile = array('image' => $file);
    $valrules = array('image' => 'image');

    $validator = Validator::make($valfile, $valrules);
    if ($validator->fails()) {
        return redirect()->action('proskpdController@proskpd')->with('style', 'danger')->with('alert', 'Gagal Di Upload ! ')->with('msg', 'Cek Tipe File');
    }else{
        $destinationPath = 'uploads';
        $size = $file->getSize();
        $extension = $file->getClientOriginalExtension();
        $fileName = $file->getClientOriginalName();
        $upload_success = $file->move($destinationPath, $fileName);


        if ($upload_success){

          if (! function_exists('bcrypt')) {
    /**
     * Hash the given value against the bcrypt algorithm.
     *
     * @param  string  $value
     * @param  array  $options
     * @return string
     */
    function bcrypt($value, $options = [])
    {
        return app('hash')->driver('bcrypt')->make($value, $options);
    }
}
            $requ = new profileModel;
            $requ->name = $request->input('name');
            $requ->jabatan = $request->input('jabatan');
            $requ->email = $request->input('email');
            $requ->password = bcrypt ($request->input('password'));
            $requ->foto = $fileName;

            $requ->save();

            return redirect()->action('proskpdController@proskpd')->with('style', 'success')->with('alert', 'Berhasil Disimpan ! ')->with('msg', 'Data Disimpan Di Database');


}
}
}

public function showChangePasswordForm(){
    return view('auth.changepassword');
}


public function getEdit($id)
{
    return view('editproskpd', ['proskpd' => profileModel::findOrFail($id)]);
}

public function ubahproskpd(Request $request)
{

    $requ     = new profileModel;
    $id     = $request->input('id');
    $requ     = profileModel::find($id);

    $requ->name = $request->input('name');
    $requ->jabatan = $request-> input('jabatan');
    $requ->save();

    return redirect()->action('proskpdController@proskpd')->with('style', 'success')->with('alert', 'Berhasil Diubah ! ')->with('msg', 'Data Diubah Di Database');


}

public function getDelete($id)
{
    $requ     = new profileModel;
    $requ     = profileModel::find($id);
    $requ->delete();

    return redirect()->action('proskpdController@proskpd')->with('style', 'success')->with('alert', 'Berhasil Dihapus ! ')->with('msg', 'Data Dihapus Di Database');
}

}



?>
