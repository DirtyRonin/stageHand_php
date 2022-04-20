<?php

namespace App\Http\Controllers;

use App\Models\CustomEvent;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class CustomEventController extends Controller
{
    public function index()
    {
        return CustomEvent::orderBy('date')
            ->with('location')
            ->with('band')
            ->with('setlist')
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
        ]);
        return CustomEvent::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CustomEvent::findOrFail($id);

        // if (auth()->user()->customEvents()->where('customEventId', $id)->exists()) {
        //     return CustomEvent::findOrFail($id);
        // }

        // return new AuthenticationException('Not your CustomEvent');
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
        if (auth()->user()->customEvents()->where('customEventId', $id)->exists()) {
            $customEvent = CustomEvent::findOrFail($id);
            $customEvent->update($request->all());
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
        if (auth()->user()->customEvents()->where('customEventId', $id)->exists()) {
            //soft delete
            return CustomEvent::destroy($id);
        }

        return new AuthenticationException('Not your CustomEvent');
    }

    public function filter($search)
    {
        return
            CustomEvent::whereRelation('users', 'userId', auth()->user()->id)
            ->where(DB::raw('Lower("title")'), 'LIKE', '%' . strtolower($search) . '%')
            ->orderBy('title')
            ->with('users')
            ->paginate();
    }
}
