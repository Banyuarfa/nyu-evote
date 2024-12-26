<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;


class OsisVoteController extends Controller
{
    public function index()
    {
        return view('osis');
    }
    public function store(Request $request)
    {
        $request->validate(["paslon" => "required|in:1,2,3"]);
        Vote::create(["paslon" => $request->paslon, "type" => "osis"]);
        return redirect("/")->with("has_vote_osis", true);
    }
}
