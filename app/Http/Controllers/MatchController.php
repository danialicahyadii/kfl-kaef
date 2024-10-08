<?php

namespace App\Http\Controllers;

use App\Imports\MatchImport;
use App\Models\Matches;
use App\Models\Teams;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $match = Matches::with(['homeTeam', 'awayTeam'])->get();
        $teams = Teams::get();
        return view('apps.match.index', compact('match', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(request()->file('file')){
            Excel::import(new MatchImport, request()->file('file'));
        }else{
            $request->validate([
                'home_team_id' => 'required|different:away_team_id',
                'away_team_id' => 'required',
                'match_date' => 'required',
                'result' => 'nullable',
            ]);

            Matches::create($request->all());
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $match = Matches::find($id);

        $homeTeamResult = $request->input('home_team_result');
        $awayTeamResult = $request->input('away_team_result');

        $homeTeam = $match->homeTeam;
        $awayTeam = $match->awayTeam;

        if ($homeTeamResult == 'win' && $awayTeamResult == 'lose') {
            $homeTeam->teamPoints->increment('points', 1);
            $homeTeam->teamPoints->increment('wins');
            $awayTeam->teamPoints->increment('losses');
        } elseif ($homeTeamResult == 'lose' && $awayTeamResult == 'win') {
            $awayTeam->teamPoints->increment('points', 1);
            $awayTeam->teamPoints->increment('wins');
            $homeTeam->teamPoints->increment('losses');
        }

        $homeTeam->teamPoints->increment('matches_played');
        $awayTeam->teamPoints->increment('matches_played');
        // dd($match, $homeTeamResult, $homeTeam);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
