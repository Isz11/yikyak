<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yak;
use App\Models\Replies;
use App\Models\User;

class YakController extends Controller
{
    public function index() {
        $yaks = Yak::orderBy('created_at','desc')->get();
        $replies = Replies::all();
        $users = User::all();
        // $replies = Replies::where('yak', 4)->count();


        return view('yaks.index', [
            'yaks' => $yaks,
            'replies' => $replies,
            'users' => $users
        ]);
    }

    public function create() {
        return view('yaks.create');
    }

    public function store() {
        $yak = new Yak();
        $yak->yak = request('yak');
        $yak->user_id = auth()->id();
        $yak->score = 0;     // maybe put a default value for this column in the database

        $yak->save();

        return redirect('/yaks')->with('mssg', 'This yak has worked');
    }

    public function show($id) {
        $yak = Yak::findOrFail($id);
        $replies = Replies::orderBy('created_at','asc')->where('yak_id', $id)->get();

        return view('yaks.show', [
            'yak'=> $yak,
            'replies'=> $replies
        ]);
    }

    public function destroy($id) {
        $yak = Yak::findOrFail($id);
        $yak->delete();

        return redirect('/yaks');
    }
}
