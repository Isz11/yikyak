<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Models\Yak;

class CommunityController extends Controller
{
    public function index() {
        $communities = Community::orderBy('name','asc')->get();

        return view('communities.index', [
            'communities' => $communities,
        ]);
    }

    public function show($id) {
        $community = Community::findOrFail($id);
        // $yaks = Yak::orderBy('created_at','asc')->where('community_id', $id)->get();

        return view('communities.show', [
            'community' => $community,
            // 'yaks'=> $yak,
        ]);
    }
}
