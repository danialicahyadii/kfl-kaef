<?php

use App\Http\Controllers\MatchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Models\Matches;
use App\Models\Teams;
use Carbon\Carbon;
// use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $teams = Teams::with('teamPoints')->get();
    $standings = $teams->map(function ($team) {
        return [
            $team->image,
            $team->teamPoints->match_points ?? 0,
            ($team->teamPoints->match_wins ?? 0) . '-' . ($team->teamPoints->match_losses ?? 0),
            ($team->teamPoints->match_wins ?? 0) - ($team->teamPoints->match_losses ?? 0),
            ($team->teamPoints->game_wins ?? 0) . '-' . ($team->teamPoints->game_losses ?? 0),
        ];
    })->toArray();
    return view('apps.frontend.home', compact('standings', 'teams'));
});

Route::get('tim', function(){
    $teams = Teams::get();
    return view('apps.frontend.tim', compact('teams'));
});

Route::get('jadwal', function(){
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
            $match->home_team_score . ' - ' . $match->away_team_score  // Hasil pertandingan
        ];
    })->toArray();
    // dd($matchesToday);
    return view('apps.frontend.jadwal', compact('matches', 'matchesToday'));
});

Route::get('berita', function(){
    return view('apps.frontend.berita');
});

Route::get('tentang-kami', function(){
    return view('apps.frontend.tentang-kami');
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('standing',  function(){
        $teams = Teams::get();
        return view('apps.standing', compact('teams'));
    })->name('standing');
    Route::get('tentang', [TeamController::class, 'tentang']);
    Route::post('tentang', [TeamController::class, 'tentang']);
    Route::resource('team', TeamController::class);
    Route::resource('match', MatchController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
