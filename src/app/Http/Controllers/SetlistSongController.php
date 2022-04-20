<?php

namespace App\Http\Controllers;

use App\Models\CustomEvent;
use App\Models\Song;
use App\Models\Setlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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

    public function setlistEditor($customEventId)
    {
        $customEvent = CustomEvent::find($customEventId);
        $result = array();

        // die id's des events und der zwei vorigen
        // die events sollen von der selben band und in der selben location sein
        // 
        //@return gibt ein Array von Id's zurück. 
        // Index 0 ist das Event passend zum Datum.
        // Index 1 ist das Event davor usw.

        $customEvents = CustomEvent::orderBy('date', 'desc')
            ->where('date', '<=', $customEvent->date)
            ->where('bandId',  $customEvent->bandId)
            ->where('locationId', $customEvent->locationId)
            ->take(3)
            ->get()
            // ->pluck('id')
            ->all(); // all() => toArray


        // Die Reihenfolge wird umgekehrt.Das älteste Event hat den Index 0.
        $reversed_prior_customEvents = array_reverse($customEvents);

        // Die Id neuesten Event wird von den anderen getrennt.
        $current = array_pop($reversed_prior_customEvents);

        if (count($reversed_prior_customEvents) == 0) {
            return $result;
        }

        // Subquery auf die setlists
        // die Treffer für alle Songs, die mit einer Setlist verbunden ist, wird auf die Id's der gesuchten custom Events beschränkt
        // Rückgabe besteht nur noch aus Id und PivotFeld
        $songsQuery = Song::with([
            'setlists' => function ($query) use ($customEvents) {
                $query->whereIn('setlistId', array_map(fn ($x) => $x->id,$customEvents) )->select('setlists.id');
            }
        ]);

        // Die Treffer für die Songs werden auf die custom events vor dem gesuchten Datum beschränkt
        // Ein Song muss mindestens einmal in einem der vorigen setlists vorhanden sein
        foreach ($reversed_prior_customEvents as $prior) {
            $songsQuery->orWhereRelation('setlists', 'setlistId', $prior->id);
        }

        //query ausführen
        $songs = $songsQuery->get()->all();

        foreach ($songs as $song) {
            $newSong = clone $song;
            unset($newSong->setlists);
            $newSong->setlists = array_map(fn ($x) => $x["id"], $song->setlists->toArray());
            $result[$newSong->id] = $newSong;
        }

        return ["events" => array_reverse($customEvents),"songs"=>$result];
        // return ["events" => $reversed_prior_customEvents,"songs"=>$result];
    }
}
