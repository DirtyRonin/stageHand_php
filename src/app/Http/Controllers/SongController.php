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
        return $this->getRequestQuery($search)
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
        return $this->getRequestQuery($search)
            ->withCount(['setlists' => function (Builder $query) use ($setlistId) {
                $query->where('setlistId', $setlistId);
            }])
            ->paginate();
    }

    private function getRequestQuery($search)
    {
        $toLowerSearch = strtolower($search);

        $terms = explode(" ", $toLowerSearch);

        $regularTerms = array();
        $specialTerms = array();

        foreach ($terms as $term) {
            if (strpos($term, '@') !== 0) {
                $regularTerms[] = $term;
            } else {
                $specialTerms[] = $term;
            }
        };

        $newRegularTerm = implode(' ', $regularTerms);
        $newSpecialTerm = implode(' ', $specialTerms);

        $isNineties = strpos($newSpecialTerm, '@ni');
        $isEvergreen = strpos($newSpecialTerm, '@ev');

        $query = Song::query();

        if (strlen($newRegularTerm) > 2) {
            $query->where(function ($query) use ($newRegularTerm) {
                $query->where(DB::raw('Lower("artist")'), 'LIKE', '%' . strtolower($newRegularTerm) . '%')
                    ->orWhere(DB::raw('Lower("title")'), 'LIKE', '%' . strtolower($newRegularTerm) . '%')
                    ->orWhere(DB::raw('Lower("genre")'), 'LIKE', '%' . strtolower($newRegularTerm) . '%');
            });
        }

        if (!is_bool($isNineties)) {
            $query->where('nineties',  true);
        }
        if (!is_bool($isEvergreen)) {
            $query->where('evergreen',  true);
        }

        return $query->orderBy('artist')
            ->orderBy('title');
    }
}
