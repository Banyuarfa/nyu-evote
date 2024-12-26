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
        Vote::create(["paslon" => $request->paslon, "type" => "osis"]);
        return redirect("/")->with("has_vote_osis", true);
    }
}
