<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    // public function index()
    // {
    //     $events = Event::where('status',0)->get();

    //     return view('admin.acceptation', compact('events'));
    // }
        public function create(){
        return view('admin.dashboard');
    }

    public function createCat(){
        return view('admin.createCatgr');
    }

    public function acceptation()
    {
        $events = Event::where('status', 0)->get();
        return view('admin.acceptation', compact('events'));
    }

    public function acceptEvent($id){
        $event = Event::find($id);
        $event->status = 1;
        $event->save();
        return redirect()->route('acceptaion.event');
    }



    public function statistics() {

        $userCount = User::exists() ? User::count() : 0;
        $eventCount = Event::exists() ? Event::count() : 0;

        return view('admin.statistics', compact('userCount', 'eventCount'));
    }
}
