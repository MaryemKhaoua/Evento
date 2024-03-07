<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $id)
    {
        return view('tickets.create', ['id' => $id->id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        // dd($request->all());
        // $validate = $request->validate([
        //     'nbrPlace' => 'required',
        //     'type' => 'required|string',
        //     'price' => 'required|float',

        // ]);

        $ticket = Ticket::create([
            'nbrPlace' => $request->input('nbrPlace'),
            'type' => $request->input('type'),
            'price' => $request->input('price'),
            'event_id' => $request->input('event_id'),



        ]);
        return redirect()->route('events.index')->with('success', 'Event created');


    }


    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
