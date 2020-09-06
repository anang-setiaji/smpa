<?php

namespace App\Http\Controllers;

use App\Http\Models\AdminModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Message;
use App\Events\NewMessage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;


class adminController extends BaseController
{
    public function admin()
    {
        $requ = AdminModel::where('jabatan', 'user')->paginate(6);
        $contacts = User::where('id', '!=', auth()->id())->get();
        // $requ = adminModel::get();
        return view('admin', ['requ' => $requ]);
    }

    public function getInput()
{
    return view('inputadmin');
}

public function simpanadmin(Request $request)
{
    $file = $request->file('foto');
    
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
            $requ = new AdminModel;
            $requ->name = $request->input('name');
            $requ->profile_image = $request->input('profile_image');
            $requ->jabatan = $request->input('jabatan');
            $requ->email = $request->input('email');
            $requ->password = bcrypt ($request->input('password'));
            $requ->foto = $fileName;

            $requ->save();

            return redirect()->action('adminController@admin')->with('style', 'success')->with('alert', 'Berhasil Disimpan ! ')->with('msg', 'Data Disimpan Di Database');


}

}



public function getEdit($id)
{
    return view('editadmin', ['admin' => AdminModel::findOrFail($id)]);
}

public function ubahadmin(Request $request)
{

    $requ     = new AdminModel;
    $id     = $request->input('id');
    $requ     = AdminModel::find($id);

    $requ->name = $request->input('name');
    $requ->jabatan = $request-> input('jabatan');
    // $requ->jabatan = $request-> input('password');

    $requ->save();

    return redirect()->action('adminController@admin')->with('style', 'success')->with('alert', 'Berhasil Diubah ! ')->with('msg', 'Data Diubah Di Database');


}

public function getDelete($id)
{
    $requ     = AdminModel::find($id);
    $requ->delete();

    return redirect()->action('adminController@admin')->with('style', 'success')->with('alert', 'Berhasil Dihapus ! ')->with('msg', 'Data Dihapus Di Database');
}

}



?>
