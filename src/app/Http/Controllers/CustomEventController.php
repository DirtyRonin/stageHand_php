<?php

namespace App\Http\Controllers;

use App\Models\CustomEvent;
use App\Models\Band;
use App\Models\Setlist;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Datetime;
use Illuminate\Support\Carbon;

class CustomEventController extends Controller
{
    public function index()
    {
        return CustomEvent::whereIn('bandId', (Band::whereRelation('users', 'userId', auth()->user()->id)->select('id')))
            ->with('location')
            ->with('band')
            ->with('setlist')
            ->orderBy('date')
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
            'date' => 'required',
            'bandId' => 'required',
            'locationId' => 'required'
        ]);


        $carbonA = Carbon::parse($request->date)->format('Y-m-d H:i:s');
        $all = $request->all();
        $all['date'] = $carbonA;

        $newCustomEvent = CustomEvent::create($all);

        $customEvent =  CustomEvent::with('location')
            ->with('band')
            ->with('setlist')
            ->findOrFail($newCustomEvent->id);

        $customEventDate = date('Y.M.d', strtotime($customEvent->date));

        Setlist::create([
            'customEventId' => $newCustomEvent->id,
            'title' => $customEvent->title . ' :: ' . $customEvent->band->title . ' :: ' . $customEvent->location->name . ' :: ' . $customEventDate,
            'comment' => ''
        ]);

        $customEvent->refresh();


        return $customEvent;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customEvent =  CustomEvent::findOrFail($id);

        if ($customEvent->exists() && auth()->user()->bands()->where('bandId', $customEvent->bandId)->exists()) {
            return $customEvent;
        }

        return new AuthenticationException('Not your CustomEvent');
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
        $customEvent =  CustomEvent::with('location')
            ->with('band')
            ->with('setlist')
            ->findOrFail($id);


        if ($customEvent->exists() && auth()->user()->bands()->where('bandId', $customEvent->bandId)->exists()) {

            $carbonA = Carbon::parse($request->date)->format('Y-m-d H:i:s');
            $all = $request->all();

            $all['date'] = $carbonA;
            $customEvent->update($all);
            $customEvent->refresh();

            $customEventDate = date('Y.M.d', strtotime($customEvent->date));

            $customEvent->setlist()->update([
                'title' => $customEvent->title . ' :: ' . $customEvent->band->title . ' :: ' . $customEvent->location->name . ' :: ' . $customEventDate,
            ]);

            return $customEvent;
        }

        return new AuthenticationException('Not your CustomEvent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customEvent =  CustomEvent::findOrFail($id);

        if ($customEvent->exists() && auth()->user()->bands()->where('bandId', $customEvent->bandId)->exists()) {
            //soft delete
            CustomEvent::destroy($id);
            return $id;
        }

        return new AuthenticationException('Not your CustomEvent');
    }

    public function filter($search)
    {
        return CustomEvent::whereIn('bandId', (Band::whereRelation('users', 'userId', auth()->user()->id)->select('id')))
            ->where("title", 'LIKE', '%' . strtolower($search) . '%')
            ->with('location')
            ->with('band')
            ->with('setlist')
            ->orderBy('date')
            ->paginate();
    }
}
