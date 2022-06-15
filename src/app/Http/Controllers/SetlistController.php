<?php

namespace App\Http\Controllers;


use App\Models\Setlist;
use App\Models\Band;
use App\Models\CustomEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SetlistController extends Controller
{
    public function index()
    {
        // find bandIds for current user
        $queryBandIdsForCurrentUser = (Band::whereRelation('users', 'userId', auth()->user()->id)->select('id'));
        //find custom events from current user through the bands
        $queryCustomEventIdsForCurrentUser = CustomEvent::whereIn('bandId', $queryBandIdsForCurrentUser)->select('id');

        //get the setlist for each found custom event
        return Setlist::whereIn('customEventId', $queryCustomEventIdsForCurrentUser)
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
        return ['message' => 'not implemented'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setlist = Setlist::find($id);

        if (!$this->isAuthorized($setlist))
            return $this->ThrowNoAuthorizationResponse();

        return $setlist;
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

        if (!$this->isAuthorized($setlist))
            return $this->ThrowNoAuthorizationResponse();

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
        $setlist = Setlist::find($id);

        if (!$this->isAuthorized($setlist))
            return $this->ThrowNoAuthorizationResponse();

        return $setlist->destroy($id);
    }

    public function filter($search)
    {
        if (auth()->user()->isAdmin == 0)
            return response()->json(['message' => 'No Authorization'], 403);

        return Setlist::where("title", 'LIKE', '%' . strtolower($search) . '%')
            ->orderBy('title')
            ->paginate();
    }

    public function showSetlistsWithSongCount($songId)
    {
        if (auth()->user()->isAdmin == 0)
            return response()->json(['message' => 'No Authorization'], 403);

        return Setlist::orderBy('title')
            ->withCount(['songs' => function (Builder $query) use ($songId) {
                $query->where('songId', $songId);
            }])
            ->paginate();
    }

    public function filterSetlistsWithSongCount($songId, $search)
    {
        if (auth()->user()->isAdmin == 0)
            return response()->json(['message' => 'No Authorization'], 403);

        return Setlist::where("title", 'LIKE', '%' . strtolower($search) . '%')
            ->orderBy('title')
            ->withCount(['songs' => function (Builder $query) use ($songId) {
                $query->where('songId', $songId);
            }])
            ->paginate();
    }

    private function isAuthorized($setlist)
    {
        $bandId =  $setlist->customEvent()->select('bandId')->first()->bandId;
        return auth()->user()->bands()->where('bandId', $bandId)->exists();
    }

    private function ThrowNoAuthorizationResponse()
    {
        return  response()->json(['message' => 'No Authorization'], 403);
    }
}
