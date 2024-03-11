<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function createReservation(Request $request)
    {

        $eventId = $request->input('event_id');
        $event = Event::find($eventId);
        $ticketId = $request->input('type');

        $checkReservation = Reservation::where('user_id', auth()->id())
            ->where('ticket_id', $ticketId)
            ->first();

        if ($checkReservation) {
            return redirect()->back()->with('error', 'You have already reserved this ticket.');
        }

        $nbrPlace = DB::table('tickets')->select('nbrPlace')->where('id', $ticketId)->value('nbrPlace');

        if ($event->acceptation === 'Auto') {

            $reservationStatus = 'Accepted';
        } else {

            $reservationStatus = 'In Progress';
        }

        $reservation = new Reservation([
            'ticket_id' => $ticketId,
            'user_id' => auth()->id(),
            'status' => $reservationStatus,
        ]);

        if ($reservation != NULL) {

            $aTickets = $nbrPlace - 1;

            DB::table('tickets')->where('id', $request->input('type'))->update(['nbrPlace' => $aTickets]);

            $reservation->save();

            return redirect()->back()->with('success', 'Ticket Reserved successfully! You can check it Now in Reservations Page');
        } else {

            return redirect()->back()->with('error', 'Ticket Reservation Error!');
        }
    }

    public function ShowReservations()
    {
        $user = auth()->id();
        $reservations = Reservation::where('user_id', $user)->get();

        return view('tickets.my_reservation', compact('reservations'));
    }
}