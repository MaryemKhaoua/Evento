<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('status', 1)->paginate(10);
        return view('events.index', compact('events'));
    }


    public function store(Request $request)
    {
        $authUserId = Auth::id();
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'description' => 'required',
        //     'lieu' => 'required',
        //     'date' => 'required|date_format:m/d/Y',
        //     'media' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'lieu' => $request->input('lieu'),
            'date' =>  $request->input('date'),
            // 'date' => Carbon::createFromFormat('m/d/Y', $request->input('date'))->format('Y-m-d'),
            'user_id' => $authUserId,
            'category_id' => $request->input('category'),
            'acceptation' => $request->input('acceptation'),
        ];

        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('uploads', 'public');
            $data['media'] = $mediaPath;
        }

      $event = Event::create($data);
         $event_id = $event->id;

         $event->status = '0';
         $event->save();

         if ($event) {
            return redirect()->route('ticket.create', ['id' => $event_id])->with('success', 'Event created');
        } else {
            return back()->withInput()->with('error', 'Failed to create event');
        }


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

        public function edit(Event $event)
        {
            return view('events.edit', compact('event'));
        }

        public function update(UpdateEventRequest $request, Event $event)
        {
            $data = [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'lieu' => $request->input('lieu'),
                'date' => Carbon::createFromFormat('m/d/Y', $request->input('date'))->format('Y-m-d'),
            ];

            if ($request->hasFile('media')) {
                $mediaPath = $request->file('media')->store('uploads', 'public');
                $data['media'] = $mediaPath;
            }

            $event->update($data);

            return redirect()->route('events.index')->with('success', 'Event updated');
        }


        public function destroy(Event $event)
        {
            $event->tickets()->delete();
            $event->delete();

            return redirect()->route('events.index')->with('success', 'Event deleted');
        }

        public function details($id)
        {
            $event = Event::find($id);

            $tTickets = DB::table('tickets')->where('event_id', $id)->sum('nbrPlace');

            return view('events.detail', compact('event', 'tTickets'));
        }

        public function search(Request $request)
        {
            $title = $request->input('title');
            $events = Event::where('title', 'like', "%$title%")->get();
            return view('events.searchRes', compact('events'));
        }


    public function EventsUser()
    {
        $user = auth()->id();
        $events = Event::where('user_id', $user)->get();

        return view('organisateur.myevent', compact('events'));
    }

    public function EventUserStats($id)
    {
        $event = Event::find($id);
        $tickets = Ticket::where('event_id', $id)->get();
        $tTickets = $tickets->sum('nbrPlace');

        $reservations = Reservation::whereIn('ticket_id', $tickets->pluck('id'))->get();

        return view('organisateur.ticketstatus', compact('event', 'tTickets', 'tickets', 'reservations'));
    }
}
