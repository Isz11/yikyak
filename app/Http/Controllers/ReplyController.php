<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yak;
use App\Models\Replies;
use App\Models\User;
use App\Notifications\YakReply;

class ReplyController extends Controller
{
    public function store($id) {
        $reply = new Replies();
        $reply->reply = request('reply');
        $reply->user_id = auth()->id();
        $reply->yak_id = $id;
        
        // grabbing the id of the user to be notified
        $user_id = Yak::where('id', $id)->first();
        $user = User::where('id', $user_id->id)->first();

        // grabbing the name of the user who replied
        $logged_in_user = User::where('id', auth()->id())->first();
        $username = $logged_in_user->username;

        $user->notify(new YakReply($username, $id));

        $reply->save();

        return redirect()->route('replies.store', [$id]);
    }
}
