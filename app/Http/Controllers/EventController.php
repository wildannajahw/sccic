<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = \App\Event::paginate(10);
        $filterKeyword = $request->get('event_name');
        if($filterKeyword){
            $events = \App\Event::where("event_name", "LIKE", "%$filterKeyword%")->paginate(10);
        }

        $categories = \App\Category::All();
        return view('events.index', ['events' => $events], ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::All();
        return view("events.create",['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_event = new \App\Event;
        $new_event->event_name = $request->get('event_name');
        $new_event->location = $request->get('location');
        $new_event->finish_date = $request->get('finish_date');
        $new_event->start_date = $request->get('start_date');
        $new_event->id_category = $request->get('id_category');
        $new_event->quota_participant = $request->get('quota_participant');
        if($request->file('logo')){
          $file = $request->file('logo')->store('logos', 'public');
          $new_event->logo = $file;
        }
        $new_event->save();


        return redirect()->route('events.create')->with('status', 'Event successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = \App\Event::findOrFail($id);
        return view('events.edit', ['event' => $event]);
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
        $event = \App\Event::findOrFail($id);
        $event->event_name = $request->get('event_name');
        $event->location = $request->get('location');
        $event->finish_date = $request->get('finish_date');
        $event->start_date = $request->get('start_date');
        $event->quota_participant = $request->get('quota_participant');
        if($request->file('logo')){
          $file = $request->file('logo')->store('logos', 'public');
          $event->logo = $file;
        }
        $event->save();
        $categories = \App\Category::All();
        return redirect()->route('events.edit', ['id' => $id], ['categories'=>$categories])->with('status', 'Event succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = \App\Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index')->with('status', 'Event successfully deleted');
    }
}
