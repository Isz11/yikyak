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
        
        $user_id = Yak::where('id', $id)->first();
        $user = User::where('id', $user_id->id)->first();
        $user->notify(new YakReply(auth()->id(), $id));

        $reply->save();

        return redirect()->route('replies.store', [$id]);
    }
}
