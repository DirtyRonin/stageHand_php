<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Setlist;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SetlistSongController extends Controller
{
    public function index($setlistId)
    {
        return Setlist::find($setlistId)
            ->songs()
            ->orderBy('order')
            ->paginate();
    }

    public function store(Request $request)
    {
        return ['message' => 'not implemented'];
    }

    public function show($setlistId, $songId)
    {
        return Setlist::find($setlistId)
            ->songs()
            ->where('songId', $songId)
            ->first();
    }

    public function update(Request $request, $setlistId)
    {
        $setlist = Setlist::find($setlistId);

        $setlist->songs()->updateExistingPivot($request->songId);

        return $setlist;
    }

    public function switchOrder(Request $request, $setlistId)
    {
        $setlist = Setlist::find($setlistId);

        $setlist->songs()->detach([
            $request->pivotA->songid,
            $request->pivotB->songid,
        ]);

        $setlist->songs()->attach([
            $request->pivotA->songid => ['order' => $request->pivotB->order],
            $request->pivotB->songid => ['order' => $request->pivotA->order]
        ]);

        return [];
    }

    public function destroy($setlistId, $songId)
    {
        $setlist  = Setlist::find($setlistId);
        $removeItem = $setlist->songs()->where('songId', $songId)->first();

        $setlist->songs()->detach($songId);

        foreach ($setlist->songs as $value) {
            if ($value->pivot->order > $removeItem->pivot->order) {
                $setlist->songs()->detach($value->pivot->songId);
                $setlist->songs()->attach([$value->pivot->songId => ['order' => $value->pivot->order - 1]]);
            }
        }

        return $songId;
    }

    public function filter($setlistId, $search)
    {
        return Setlist::find($setlistId)
            ->songs()
            ->where(DB::raw('Lower("artist")'), 'LIKE', '%' . strtolower($search) . '%')
            ->orWhere(DB::raw('Lower("title")'), 'LIKE', '%' . strtolower($search) . '%')
            ->orWhere(DB::raw('Lower("genre")'), 'LIKE', '%' . strtolower($search) . '%')
            ->orderBy('artist')
            ->orderBy('title')
            ->paginate();
    }

    public function addSongToSetlist(Request $request)
    {
        $setlistSongs = Setlist::find($request->setlistId);
        $setlistSongs->songs()->attach([$request->songId => ['order' => count($setlistSongs->songs)]]);
        return true;
    }
}
