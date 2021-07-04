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
        $reply->user = auth()->id();
        $reply->yak = $id;

        $reply->save();

        return redirect()->route('replies.store', [$id]);
    }
}
