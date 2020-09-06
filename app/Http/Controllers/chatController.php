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


class chatController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chat()
    {
        $contacts = User::where('id', '!=', auth()->id())->get();
        return view('chat', ['contacts' => $contacts]);
    }
    public function getupdate()
    {
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
        ->where('to', auth()->id())
        ->where('read', false)
        ->groupBy('from')
        ->first();
        return response()->json($unreadIds);
    }

    public function get()
    {
        $contacts = User::where('id', '!=', auth()->id())->get();
        // get a collection of items where sender_id is the user who sent us a message
        // and messages_count is the number of unread messages we have from him
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        // add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });


        return response()->json($contacts);
    }
    public function getMessagesFor($id)
    {
        Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);
                // get all messages between the authenticated user and the selected user
        $messages = Message::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
        ->get();
        return response()->json($messages);
    }

    public function send(Request $request)
    {
        if ($request->image !== ''):
        $message = Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text,
            'image' => $request->image,
            'filename' => $request->filename
        ]);
        else:
            $message = Message::create([
                'from' => auth()->id(),
                'to' => $request->contact_id,
                'text' => $request->text,
            ]);
        endif;

        // broadcast(new NewMessage($message));

        return response()->json($message);
    }
    



}

?>