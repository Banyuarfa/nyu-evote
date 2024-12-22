<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;


class OsisVoteController extends Controller
{
    public function store(Request $request)
    {
        Vote::create(["paslon" => $request->paslon, "type" => "osis"]);
        return redirect("/")->with("vote_an_osis", true);
    }
}
