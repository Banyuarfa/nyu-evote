<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class StatisticsContorller extends Controller
{
    public function index(Request $request)
    {
        function paslon($number, $type)
        {
            return Vote::where("paslon", "=", $number)->where("type", "=", $type)->count();
        };

        $osis = ["paslon_1" => paslon(1, "osis"), "paslon_2" => paslon(2, "osis"), "paslon_3" => paslon(3, "osis")];
        $mpk = ["paslon_1" => paslon(1, "mpk"), "paslon_2" => paslon(2, "mpk")];

        $vote_counts = json_encode(compact("osis", "mpk"));
        $total_vote = Vote::all()->count();
        $total_osis_vote = Vote::all()->where("type", "=", "osis")->count();
        $total_mpk_vote = Vote::all()->where("type", "=", "mpk")->count();

        return view("statistik", compact("total_vote", "total_osis_vote", "total_mpk_vote", "vote_counts"));
    }
}
