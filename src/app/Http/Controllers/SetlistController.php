<?php

namespace App\Http\Controllers;


use App\Models\Setlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SetlistController extends Controller
{
    public function index()
    {
        return Setlist::orderBy('title')
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
            'customEventId' => 'required'
        ]);

        return Setlist::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Setlist::find($id);
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
        $setlist = Setlist::find($id);
        $setlist->update($request->all());
        return $setlist;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Setlist::destroy($id);
    }

    public function filter($search)
    {
        return Setlist::where(DB::raw('Lower("title")'), 'LIKE', '%' . strtolower($search) . '%')
            ->orderBy('title')
            ->paginate();
    }

    public function showSetlistsWithSongCount($songId)
    {
        return Setlist::orderBy('title')
            ->withCount(['songs' => function (Builder $query) use ($songId) {
                $query->where('songId', $songId);
            }])
            ->paginate();
    }

    public function filterSetlistsWithSongCount($songId, $search)
    {
        return Setlist::where(DB::raw('Lower("title")'), 'LIKE', '%' . strtolower($search) . '%')
            ->orderBy('title')
            ->withCount(['songs' => function (Builder $query) use ($songId) {
                $query->where('songId', $songId);
            }])
            ->paginate();
    }
}
