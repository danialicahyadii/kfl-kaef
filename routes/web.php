<?php

use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Models\Matches;
use App\Models\Teams;
use Carbon\Carbon;
// use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::controller(FrontEndController::class)->group(function () {
    Route::get('', 'home');
    Route::get('tim', 'tim');
    Route::get('jadwal', 'jadwal');
    Route::get('berita', 'berita');
    Route::get('berita-detail', 'beritaDetail');
    Route::get('tentang-kami', 'tentangKami');
});

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('',  function(){
            $teams = Teams::get();
            return view('apps.standing', compact('teams'));
        })->name('standing');
        Route::resource('team', TeamController::class);
        Route::resource('match', MatchController::class);
        Route::resource('news', NewsController::class);
        Route::get('tentang-kami', function(){
            return view('apps.tentang.index');
        });
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
