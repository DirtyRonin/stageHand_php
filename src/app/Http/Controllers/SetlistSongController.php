<?php

namespace App\Http\Controllers;

use App\Models\CustomEvent;
use App\Models\Song;
use App\Models\Setlist;
use App\Models\SetlistSong;
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

    public function swapOrder(Request $request)
    {

        // if (auth()->user()->id == 1){

        $request->validate([
            'id' => 'required',
            'order' => 'required',
        ]);

        $x = SetlistSong::select('id', 'order', 'setlistId', 'songId')->where('id', $request->id)->first();
        $y = SetlistSong::select('id', 'order', 'songId')->where([['order', '=', $request->order], ['setlistId', '=', $x->setlistId]])->first();

        SetlistSong::where('id', $x->id)->update(['order' => $y->order]);
        SetlistSong::where('id', $y->id)->update(['order' => $x->order]);

        $setlist = Setlist::find($x->setlistId)
            ->songs()
            ->where('setlistSongs.id', '=', $x->id)
            ->orWhere([['setlistSongs.id', '=', $y->id], ['setlistSongs.setlistId', '=', $x->setlistId]])
            ->get()
            ->all();

        return $setlist;
        // }



        // $setlistSongs = SetlistSong::where('id',$x->id)
        // // ->orWhere('id',$y->id)
        // ->setlist()
        // ->get()
        // ->all();

        // return [$x, $y];

        // return $setlist = Setlist::find($x->setlistId)
        // ->songs()
        // ->where([['setlistSongs.id','=', $x->id]])
        // ->orWhere([['setlistSongs.id','=', $y->id],['id','=', $x->setlistId]])
        // ->get()
        // ->all();


        // $newX = SetlistSong::where('id', $x->id)->first();
        // $newY = SetlistSong::where('id', $y->id)->first();

        // return [$x, $y];
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
            ->where("artist", 'LIKE', '%' . strtolower($search) . '%')
            ->orWhere([["title", 'LIKE', '%' . strtolower($search) . '%'], ['setlistSongs.setlistId', '=', $setlistId]])
            ->orWhere([["genre", 'LIKE', '%' . strtolower($search) . '%'], ['setlistSongs.setlistId', '=', $setlistId]])
            ->orderBy('artist')
            ->orderBy('title')
            ->paginate();
    }

    public function addSongToSetlist(Request $request)
    {
        // check if song exists 
        // avoid dublicates

        $setlistSongs = Setlist::find($request->setlistId);
        $setlistSongs->songs()->attach([$request->songId => ['order' => count($setlistSongs->songs) + 1]]);
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
            ->with(['setlist' => function ($query) {
                $query->select('id');
            }])
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
                $query->whereIn('setlistId', array_map(fn ($x) => $x->id, $customEvents))->select('setlists.id');
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

        return ["events" => array_reverse($customEvents), "songs" => $result];
        // return ["events" => $reversed_prior_customEvents,"songs"=>$result];
    }
}
