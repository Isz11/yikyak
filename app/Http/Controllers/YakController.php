<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yak;

class YakController extends Controller
{
    public function index() {
        $yaks = Yak::orderBy('created_at','desc')->get();
        return view('yaks.index', [
            'yaks' => $yaks,
        ]);
    }

    public function create() {
        return view('yaks.create');
    }

    public function store() {
        $yak = new Yak();
        $yak->yak = request('yak');
        $yak->user = auth()->id();
        $yak->score = 0;     // maybe put a default value for this column in the database

        $yak->save();

        return redirect('/yaks')->with('mssg', 'This yak has worked');
    }
}
