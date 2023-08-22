<?php

namespace App\Http\Controllers;

use App\Models\CommercialEvent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommercialEventController extends Controller
{
    public function index()
    {
        $commercialEvents = CommercialEvent::all();
        return view('commercial-events.index', compact('commercialEvents'));
    }

    public function create()
    {
        return view('commercial-events.create');
    }

    public function store(Request $request)
    {
        CommercialEvent::create([
            'title' => $request->input('title'),
            'event_date' => $request->input('event_date'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('commercial-events.index');
    }

    public function show(CommercialEvent $commercialEvent)
    {
        return view('commercial-events.show', compact('commercialEvent'));
    }

    public function edit(CommercialEvent $commercialEvent)
    {
        return view('commercial-events.edit', compact('commercialEvent'));
    }

    public function update(Request $request, CommercialEvent $commercialEvent)
    {
        $commercialEvent->update([
            'title' => $request->input('title'),
            'event_date' => $request->input('event_date'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('commercial-events.index');
    }

    public function destroy(CommercialEvent $commercialEvent)
    {
        $commercialEvent->delete();
        return redirect()->route('commercial-events.index');
    }
}
