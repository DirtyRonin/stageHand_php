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
        if (!$this->isAuthorized($bandId))
            $this->ThrowNoAuthorizationResponse();

        return Band::find($bandId)
            ->songs()
            ->orderBy('artist')
            ->orderBy('title')
            ->paginate();
    }

    public function store(Request $request)
    {
        if (!$this->isAuthorized($request->bandId))
            $this->ThrowNoAuthorizationResponse();

        $band = Band::find($request->bandId);
        $band->songs()->attach($request->songId);
        return $band;
    }

    public function show($bandId, $songId)
    {
        if (!$this->isAuthorized($bandId))
            $this->ThrowNoAuthorizationResponse();

        return Band::find($bandId)
            ->songs()
            ->where('songId', $songId)
            ->first();
    }

    public function update(Request $request, $bandId)
    {
        if (!$this->isAuthorized($bandId))
            $this->ThrowNoAuthorizationResponse();

        $band = Band::find($bandId);

        $band->songs()->updateExistingPivot($request->songId, [
            'popularity' => $request->popularity
        ]);

        return $band;
    }

    public function destroy($bandId, $songId)
    {
        if (!$this->isAuthorized($bandId))
            $this->ThrowNoAuthorizationResponse();

        $band = Band::find($bandId);
        $band->songs()->detach($songId);
        return $songId;
    }

    public function filter($bandId, $search)
    {
        if (!$this->isAuthorized($bandId))
            $this->ThrowNoAuthorizationResponse();

        return Band::find($bandId)
            ->songs()
            ->where("artist", 'LIKE', '%' . strtolower($search) . '%')
            ->orWhere("title", 'LIKE', '%' . strtolower($search) . '%')
            ->orWhere("genre", 'LIKE', '%' . strtolower($search) . '%')
            ->orderBy('artist')
            ->orderBy('title')
            ->paginate();
    }

    public function addSongToBand(Request $request)
    {
        if (!$this->isAuthorized($request->bandId))
            $this->ThrowNoAuthorizationResponse();

        $band = Band::find($request->bandId);
        $band->songs()->attach($request->songId);
        return true;
    }

    private function isAuthorized($bandId)
    {
        return auth()->user()->bands()->where('bandId', $bandId)->exists();
    }

    private function ThrowNoAuthorizationResponse()
    {
        return  response()->json(['message' => 'Not Your Band'], 403);
    }
}
