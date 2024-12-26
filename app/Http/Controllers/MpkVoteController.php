<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class MpkVoteController extends Controller
{
    public function store(Request $request)
    {
        Vote::create(["paslon" => $request->paslon, "type" => "mpk"]);

        return redirect("/")->with("has_vote_mpk", true);
    }
}
