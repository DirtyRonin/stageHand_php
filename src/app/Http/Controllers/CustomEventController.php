<?php

namespace App\Http\Controllers;

use App\Models\CustomEvent;
use App\Models\Band;
use App\Models\Setlist;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Carbon;

class CustomEventController extends Controller
{
    public function index()
    {
        return CustomEvent::whereIn('bandId', (Band::whereRelation('users', 'userId', auth()->user()->id)->select('id')))
            ->with('location')
            ->with('band')
            ->with('setlist')
            ->orderBy('date','DESC')
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

        Setlist::create([
            'customEventId' => $newCustomEvent->id,
            'title' => $this->generateSelistName($customEvent),
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

        if (!$customEvent->exists())
            return response()->json(['message' => 'Concert do not exist'], 500);

        if (!$this->isAuthorized($customEvent))
            $this->ThrowNoAuthorizationResponse();

        return $customEvent;
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

        if (!$customEvent->exists())
            return response()->json(['message' => 'Concert do not exist'], 500);

        if (!$this->isAuthorized($customEvent))
            $this->ThrowNoAuthorizationResponse();

        $carbonA = Carbon::parse($request->date)->format('Y-m-d H:i:s');
        $all = $request->all();

        $all['date'] = $carbonA;
        $customEvent->update($all);
        $customEvent->refresh();

        $customEvent->setlist()->update([
            'title' => $this->generateSelistName($customEvent)
        ]);

        return $customEvent;
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

        if (!$customEvent->exists())
            return response()->json(['message' => 'Concert do not exist'], 500);

        if (!$this->isAuthorized($customEvent))
            $this->ThrowNoAuthorizationResponse();

        //soft delete
        CustomEvent::destroy($id);
        return $id;
    }

    public function filter($search)
    {
        return CustomEvent::whereIn('bandId', (Band::whereRelation('users', 'userId', auth()->user()->id)->select('id')))
            ->whereRelation("setlist", 'title', 'LIKE', '%' . strtolower($search) . '%')
            ->with('location')
            ->with('band')
            ->with('setlist')
            ->orderBy('date','DESC')
            ->paginate();
    }

    private function isAuthorized($customEvent)
    {
        return auth()->user()->bands()->where('bandId', $customEvent->bandId)->exists();
    }

    private function ThrowNoAuthorizationResponse()
    {
        return  response()->json(['message' => 'Not Your Concert'], 403);
    }

    private function generateSelistName($customEvent)
    {
        $customEventDate = date('Y.M.d', strtotime($customEvent->date));
        return $customEvent->title . ' :: ' . $customEvent->band->title . ' :: ' . $customEvent->location->name . ' :: ' . $customEventDate;
    }
}
