<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Teams;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home()
    {
        $teams = Teams::with('teamPoints')->get()->sortByDesc(function ($team) {
            $points = $team->teamPoints ? $team->teamPoints->match_points : 0;
            if ($points < 0) {
                return -PHP_INT_MAX;
            }
            $game = ($team->teamPoints->game_wins ?? 0) - ($team->teamPoints->game_losses ?? 0);
            return [$points, $team->teamPoints ? $game : 0];
        });
        return view('apps.frontend.home', compact('teams'));
    }

    public function tim()
    {
        $teams = Teams::get();
        return view('apps.frontend.tim', compact('teams'));
    }

    public function jadwal()
    {
        $today = Carbon::now()->format('Y-m-d');
        $match = Matches::all();
        $matches = $match->map(function ($match) {
            return [
                Carbon::parse($match->match_date)->locale('id')->translatedFormat('l, j F Y'),     // Tanggal pertandingan
                $match->homeTeam->image ?? $match->homeTeam->name,
                'vs',
                $match->awayTeam->image ?? $match->awayTeam->name,
                $match->home_team_score . ' - ' . $match->away_team_score  // Hasil pertandingan
            ];
        })->toArray();
        $matchToday = Matches::where('match_date', $today)->get();
        $matchesToday = $matchToday->map(function ($match) {
            return [
                Carbon::parse($match->match_date)->locale('id')->translatedFormat('l, j F Y'),     // Tanggal pertandingan
                $match->homeTeam->image ?? $match->homeTeam->name,
                'vs',
                $match->awayTeam->image ?? $match->awayTeam->name,
                $match->home_team_score . ' - ' . $match->result  // Hasil pertandingan
            ];
        })->toArray();
        // dd($matchesToday);
        return view('apps.frontend.jadwal', compact('matches', 'matchesToday'));
    }

    public function berita()
    {
        return view('apps.frontend.berita');
    }
    public function beritaDetail()
    {
        return view('apps.frontend.berita-detail');
    }

    public function tentangKami()
    {
        return view('apps.frontend.tentang-kami');
    }
}
