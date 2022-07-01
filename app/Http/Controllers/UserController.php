<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yak;
use App\Models\Replies;
use App\Models\User;
use App\Models\Vote;

class UserController extends Controller
{
    public function show($username) {
        $replies = Replies::all();
        $user = User::where('username', $username)->firstOrFail();
        $yaks = Yak::orderBy('created_at','desc')
            ->where('user_id', $user->id)
            ->get();
        $yakarma_from_posts = Yak::where('user_id', $user->id)->sum('score');
        $yakarma_from_total_posts = Yak::where('user_id', $user->id)->count();
        // $yakarma_from_replies = TO DO once reply votes are implemented.
        $yakarma_from_total_replies = Replies::where('user_id', $user->id)->count();
        $yakarma_from_votes = Vote::where('user_id', $user->id)
                            ->where('vote', '!=', 0)
                            ->count();
        $yakarma_total = 
            $yakarma_from_posts +
            $yakarma_from_total_posts +
            $yakarma_from_total_replies +
            $yakarma_from_votes;

        return view('profile.show', [
            'yaks' => $yaks,
            'replies' => $replies,
            'user' => $user,
            'yakarma' => $yakarma_total,
        ]);
    }
}
