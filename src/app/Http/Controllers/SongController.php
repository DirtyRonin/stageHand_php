<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SongController extends Controller
{
    public function index()
    {
        return Song::orderBy('artist')
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
            'artist' => 'required',
            'title' => 'required',
            'genre' => 'required',
        ]);

        return Song::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Song::find($id);
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
        $song = Song::find($id);
        $song->update($request->all());
        return $song;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Song::destroy($id);
    }

    public function filter($search)
    {
        return Song::where(DB::raw('Lower("artist")'), 'LIKE', '%' . strtolower($search) . '%')
            ->orWhere(DB::raw('Lower("title")'), 'LIKE', '%' . strtolower($search) . '%')
            ->orderBy('artist')
            ->orderBy('title')
            ->paginate();
    }

    public function showSongsWithSetlistCount($setlistId)
    {
        return Song::orderBy('artist')
            ->orderBy('title')
            ->withCount(['setlists' => function (Builder $query) use ($setlistId) {
                $query->where('setlistId', $setlistId);
            }])
            ->paginate();
    }

    public function filterSongsWithSetlistCount($setlistId, $search)
    {
        return Song::where(DB::raw('Lower("artist")'), 'LIKE', '%' . strtolower($search) . '%')
            ->orWhere(DB::raw('Lower("title")'), 'LIKE', '%' . strtolower($search) . '%')
            ->orderBy('artist')
            ->orderBy('title')
            ->withCount(['setlists' => function (Builder $query) use ($setlistId) {
                $query->where('setlistId', $setlistId);
            }])
            ->paginate();
    }
}
