<?php

namespace App\Http\Controllers;

use App\Imports\TeamsImport;
use App\Models\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team = Teams::get();
        return view('apps.team.index', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Excel::import(new TeamsImport, request()->file('file'));
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
        $team = Teams::find($id);
        if(request()->file('logo')){
            if ($team->image) {
                $folderPath = 'logo/' . $team->name;
                Storage::disk('public')->deleteDirectory($folderPath);
            }
            $name = $request->logo->getClientOriginalName();
            $image = $request->logo->storeAs('logo/'.$team->name, $name, 'public');
            $imageUrl = asset('storage/' . $image);
        }
        $team->update([
            'name' => $request->name,
            'image' => $imageUrl,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function tentang()
    {
        return view('apps.tentang.index');
    }

    public function tentangStore(Request $request)
    {

    }
}
