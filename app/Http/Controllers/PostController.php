<?php

namespace App\Http\Controllers;
use App\Posts;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index(){
    $post = Posts::paginate(4);
    return view('post.index',compact('post'));
  }

  public function addPost(Request $request){
    $rules = array(
      'nik' => 'required',
      'nama' => 'required',
      'gender' => 'required',
      'kk' => 'required',
      'alamat' => 'required',
      'lingkungan' => 'required',
      'kategori' => 'required',
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
    $post = new Posts;
    $post->nik = $request->nik;
    $post->nama = $request->nama;
    $post->gender = $request->gender;
    $post->kk = $request->kk;
    $post->alamat = $request->alamat;
    $post->lingkungan = $request->lingkungan;
    $post->kategori = $request->kategori;

    $post->save();
    return response()->json($post);
  }
}

public function editPost(request $request){
$post = Posts::find ($request->id);
$post->nik = $request->nik;
$post->nama = $request->nama;
$post->gender = $request->gender;
$post->kk = $request->kk;
$post->alamat = $request->alamat;
$post->lingkungan = $request->lingkungan;
$post->kategori = $request->kategori;
$post->save();
return response()->json($post);
}

public function deletePost(request $request){
$post = Posts::find ($request->id)->delete();
return response()->json();
}
}
