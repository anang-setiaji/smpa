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
        $requ = AdminModel::where('jabatan', 'admin')->orwhere('jabatan','programmer')->paginate(6);
        $contacts = User::where('id', '!=', auth()->id())->get();
        // $requ = adminModel::get();
        return view('admin', ['requ' => $requ]);
    }

    public function daftarskpd()
    {
        $requ = AdminModel::where('jabatan', 'user')->paginate(6);
        $contacts = User::where('id', '!=', auth()->id())->get();
        // $requ = adminModel::get();
        return view('daftarskpd', ['requ' => $requ]);
    }

    public function getInput()
{
    return view('inputadmin');
}
public function getInputSkpd()
{
    return view('inputskpd');
}


public function simpanadmin(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'contact' => 'required',
        'jabatan' => 'required',
        'foto' =>  'required|mimes:jpeg,png,jpg,gif,svg|max:5048',
        'password' => 'required',

    ]);
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

public function simpanskpd(Request $request)
{

    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'foto' =>  'required|mimes:jpeg,png,jpg,gif,svg|max:5048',
        'password' => 'required',

    ]);

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

            return redirect()->action('adminController@daftarskpd')->with('style', 'success')->with('alert', 'Berhasil Disimpan ! ')->with('msg', 'Data Disimpan Di Database');


}

}
public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

            // mengambil data dari table pegawai sesuai pencarian data        
        $requ =  AdminModel::where('jabatan', 'user')
        ->where('name','LIKE',"%{$cari}%")
        ->paginate(6);
 
            // mengirim data pegawai ke view index
        return view('admin',['requ' => $requ]);
 
    }


public function getEdit($email)
{
    return view('editadmin', ['admin' => AdminModel::where('email', $email)->firstOrFail()]);
}

public function getEditSkpd($id)
{
    return view('editskpd', ['admin' => AdminModel::findOrFail($id)]);
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

public function ubahskpd(Request $request)
{

    $requ     = new AdminModel;
    $id     = $request->input('id');
    $requ     = AdminModel::find($id);

    $requ->name = $request->input('name');
    $requ->jabatan = $request-> input('jabatan');
    // $requ->jabatan = $request-> input('password');

    $requ->save();

    return redirect()->action('adminController@daftarskpd')->with('style', 'success')->with('alert', 'Berhasil Diubah ! ')->with('msg', 'Data Diubah Di Database');


}

public function getDelete($id)
{
    $requ     = AdminModel::find($id);
    $requ->delete();

    return redirect()->action('adminController@admin')->with('style', 'success')->with('alert', 'Berhasil Dihapus ! ')->with('msg', 'Data Dihapus Di Database');
}



}



?>
