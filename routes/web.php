<?php

use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Models\Bracket;
use App\Models\Matches;
use App\Models\Teams;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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
        Route::get('bracket', function(){
            $bracket = Bracket::find(1);
            return view('apps.bracket.index', compact('bracket'));
        });
        Route::post('bracket/{param}', function(Request $request, $id){
            $bracket = Bracket::find($id);

            if(request()->file('file')){
                if ($bracket->image) {
                    $folderPath = 'bracket';
                    Storage::disk('public')->deleteDirectory($folderPath);
                }
                $name = $request->file->getClientOriginalName();
                $image = $request->file->storeAs('bracket', $name, 'public');
                $imageUrl = asset('storage/' . $image);
            }
            $bracket->update([
                'image' => $imageUrl
            ]);
            return back();
        })->name('bracket.update');
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
