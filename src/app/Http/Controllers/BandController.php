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
        if (auth()->user()->id == 1) // id 1 ist admin
        {

            $request->validate([
                'title' => 'required',
            ]);

            $newBand = Band::create($request->all());

            User::findOrFail(1)->bands()->attach($newBand->id);

            return $newBand;
        }

        return new AuthenticationException('You Are No Admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()->bands()->where('bandId', $id)->exists()) {
            return Band::findOrFail($id);
        }

        return new AuthenticationException('Not your Band');
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
        if (auth()->user()->bands()->where('bandId', $id)->exists()) {
            $band = Band::findOrFail($id);
            $band->update($request->all());
            return $band;
        }

        return new AuthenticationException('Not your Band');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->bands()->where('bandId', $id)->exists()) {
            //soft delete
            return Band::destroy($id);
        }

        return new AuthenticationException('Not your Band');
    }

    public function filter($search)
    {
        return
            Band::whereRelation('users', 'userId', auth()->user()->id)
            ->where(DB::raw('Lower("title")'), 'LIKE', '%' . strtolower($search) . '%')
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
            ->where(DB::raw('Lower("title")'), 'LIKE', '%' . strtolower($search) . '%')
            ->orderBy('title')
            ->withCount(['songs' => function (Builder $query) use ($songId) {
                $query->where('songId', $songId);
            }])
            ->paginate();
    }
}
