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

        // Input skor tim home dan away
        $homeTeamScore = (int) $request->input('home_team_score'); // Skor tim home
        $awayTeamScore = (int) $request->input('away_team_score'); // Skor tim away

        $homeTeam = $match->homeTeam;
        $awayTeam = $match->awayTeam;

        $homeTeam->teamPoints()->firstOrCreate(
            ['team_id' => $homeTeam->id],
        );

        $awayTeam->teamPoints()->firstOrCreate(
            ['team_id' => $awayTeam->id],
        );

        // Jika skor tim home lebih besar dari away, tim home menang
        if ($homeTeamScore > $awayTeamScore) {
            // Home team menang
            $homeTeam->teamPoints->increment('match_points', 1); // Tambah match point
            $homeTeam->teamPoints->increment('match_wins'); // Tambah match win
            $homeTeam->teamPoints->increment('game_wins', $homeTeamScore); // Tambah game wins
            $homeTeam->teamPoints->increment('game_losses', $awayTeamScore); // Tambah game losses

            // Away team kalah
            $awayTeam->teamPoints->increment('match_losses'); // Tambah match loss
            $awayTeam->teamPoints->increment('game_wins', $awayTeamScore); // Tambah game wins
            $awayTeam->teamPoints->increment('game_losses', $homeTeamScore); // Tambah game losses

        } elseif ($awayTeamScore > $homeTeamScore) {
            // Away team menang
            $awayTeam->teamPoints->increment('match_points', 1); // Tambah match point
            $awayTeam->teamPoints->increment('match_wins'); // Tambah match win
            $awayTeam->teamPoints->increment('game_wins', $awayTeamScore); // Tambah game wins
            $awayTeam->teamPoints->increment('game_losses', $homeTeamScore); // Tambah game losses

            // Home team kalah
            $homeTeam->teamPoints->increment('match_losses'); // Tambah match loss
            $homeTeam->teamPoints->increment('game_wins', $homeTeamScore); // Tambah game wins
            $homeTeam->teamPoints->increment('game_losses', $awayTeamScore); // Tambah game losses
        }
        $match->update([
            'home_team_score' => $homeTeamScore,
            'away_team_score' => $awayTeamScore,
            'is_completed' => true
        ]);

        return back();
    }

    private function updateWinLoss($currentRecord, $result)
    {
        [$wins, $losses] = explode('-', $currentRecord);
        if ($result === 'win') {
            $wins++;
        } else {
            $losses++;
        }
        return "$wins-$losses";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
