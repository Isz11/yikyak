<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yak;
use App\Models\Replies;

class ReplyController extends Controller
{
    public function store($id) {
        $reply = new Replies();
        $reply->reply = request('reply');
        $reply->user_id = auth()->id();
        $reply->yak_id = $id;

        $reply->save();

        return redirect()->route('replies.store', [$id]);
    }
}
