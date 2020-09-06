<?php

namespace App\Http\Controllers;

use App\Http\Models\AdminModel;
use App\User;
use App\Message;
use App\Events\NewMessage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;


class chatsController extends BaseController
{
    

public function chats()
    {
        $contacts = User::where('id', '!=', auth()->id())->get();
        return view('chats', ['contacts' => $contacts]);
    }
    

}

?>