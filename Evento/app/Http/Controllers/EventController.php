<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $events = Event::all();
      return view('events.index', compact('events'));
    }


    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //    return view('Events.index');
    // }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $authUserId = Auth::id();

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'lieu' => 'required',
            'date' => 'required|date_format:m/d/Y',
            'media' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'lieu' => $request->input('lieu'),
            'date' => $request->input('date'),
            'user_id' => $authUserId,
        ];

        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('uploads', 'public');
            $data['media'] = $mediaPath;
        }

         Event::create($data);

        return redirect()->route('events.index')->with('success', 'Event created');
    }
//     $media = $request->file('media')->store('images', 'public');
//     // dd(auth()->id());
// $event = new Event([
//     'title' => $request->input('title'),
//     'description' => $request->input('description'),
//     'date' => $request->input('date'),
//     'lieu' => $request->input('lieu'),
//     'media' => $media,
//     'user_id' => $authUserId,

// ]);

// $event->save();

// return redirect()->route('home')->with('success', 'Event created');
// }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
