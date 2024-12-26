<?php

namespace App\Http\Controllers;

use App\Models\Vote;

class StatisticsController extends Controller
{
    public function index()
    {
        return view("statistik");
    }
    public function getData()
    {
        try {
            $vote_counts = [
                "osis" => Vote::select('paslon', Vote::raw('COUNT(*) as count'))
                    ->whereIn('type', ['osis'])
                    ->groupBy("paslon")
                    ->get() ?? [],
                "mpk" => Vote::select('paslon', Vote::raw('COUNT(*) as count'))
                    ->whereIn('type', ['mpk'])
                    ->groupBy("paslon")
                    ->get() ?? [],
                "total" =>
                [
                    "all" => Vote::count() ?? 0,
                    "osis" => Vote::whereIn('type',  ['osis'])->count() ?? 0,
                    "mpk" => Vote::whereIn('type', ['mpk'])->count() ?? 0
                ],
            ];

            return response()->json($vote_counts);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch data'], 500);
        }
    }
}
