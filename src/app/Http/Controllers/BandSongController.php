<?php

namespace App\Http\Controllers;

use App\Models\BandSong;
use App\Models\Band;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BandSongController extends Controller
{
    public function index($bandId)
    {
        if (auth()->user()->bands()->where('bandId', $bandId)->exists()) {
            return Band::find($bandId)
                ->songs()
                ->orderBy('artist')
                ->orderBy('title')
                ->paginate();
        }
        return ['message' => 'You are not part of the band'];
    }

    public function store(Request $request)
    {
        if (auth()->user()->bands()->where('bandId', $request->bandId)->exists()) {
            $band = Band::find($request->bandId);
            $band->songs()->attach($request->songId);
            return $band;
        }
    }

    public function show($bandId, $songId)
    {
        if (auth()->user()->bands()->where('bandId', $bandId)->exists()) {
            return Band::find($bandId)
                ->songs()
                ->where('songId', $songId)
                ->first();
        }
        
    }

    public function update(Request $request, $bandId)
    {
        if (auth()->user()->bands()->where('bandId', $bandId)->exists()) {
            $band = Band::find($bandId);

            $band->songs()->updateExistingPivot($request->songId, [
                'popularity' => $request->popularity
            ]);

            return $band;
        }
    }

    public function destroy($bandId, $songId)
    {
        if (auth()->user()->bands()->where('bandId', $bandId)->exists()) {
            $band = Band::find($bandId);
            $band->songs()->detach($songId);
            return $songId;
        }
    }

    public function filter($bandId, $search)
    {
        if (auth()->user()->bands()->where('bandId', $bandId)->exists()) {
            return Band::find($bandId)
                ->songs()
                ->where("artist", 'LIKE', '%' . strtolower($search) . '%')
                ->orWhere("title", 'LIKE', '%' . strtolower($search) . '%')
                ->orWhere("genre", 'LIKE', '%' . strtolower($search) . '%')
                ->orderBy('artist')
                ->orderBy('title')
                ->paginate();
        }
        return ['message' => 'You are not part of the band'];
    }

    public function addSongToBand(Request $request)
    {
        if (auth()->user()->bands()->where('bandId', $request->bandId)->exists()) {
            $band = Band::find($request->bandId);
            $band->songs()->attach($request->songId);
            return true;
        }
    }
}
