<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class BandController extends Controller
{
    public function index()
    {
        return Band::whereRelation('users', 'userId', auth()->user()->id)
            ->orderBy('title')
            ->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $newBand = Band::create($request->all());

        auth()->user()->bands()->attach($newBand->id);

        return $newBand;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$this->isAuthorized($id))
            $this->ThrowNoAuthorizationResponse();

        return Band::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$this->isAuthorized($id))
            $this->ThrowNoAuthorizationResponse();

        $band = Band::findOrFail($id);
        $band->update($request->all());
        return $band;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->isAuthorized($id))
            $this->ThrowNoAuthorizationResponse();

        auth()->user()->bands()->detach($id);
        //soft delete
        return Band::destroy($id);
    }

    public function filter($search)
    {
        return
            Band::whereRelation('users', 'userId', auth()->user()->id)
            ->where("title", 'LIKE', '%' . strtolower($search) . '%')
            ->orderBy('title')
            ->with('users')
            ->paginate();
    }

    public function showBandsWithSongCount($songId)
    {
        return Band::whereRelation('users', 'userId', auth()->user()->id)
            ->orderBy('title')
            ->withCount(['songs' => function (Builder $query) use ($songId) {
                $query->where('songId', $songId);
            }])
            ->paginate();
    }

    public function filterBandsWithSongCount($songId, $search)
    {
        return Band::whereRelation('users', 'userId', auth()->user()->id)
            ->where("title", 'LIKE', '%' . strtolower($search) . '%')
            ->orderBy('title')
            ->withCount(['songs' => function (Builder $query) use ($songId) {
                $query->where('songId', $songId);
            }])
            ->paginate();
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
