<?php

namespace App\Http\Controllers;

use App\Models\EventParticipant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EventParticipantController extends Controller
{
    public function index()
    {
        $participants = EventParticipant::with('user')->get();
        return view('event-participants.index', compact('participants'));
    }

    public function create()
    {
        $users = User::all();
        $events = EventParticipant::all();
        return view('event-participants.create', compact('users', 'events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:commercial_events,id',
            'user_id' => 'required|exists:users,id',
        ]);

        EventParticipant::create([
            'event_id' => $request->event_id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('event-participants.index')
            ->with('success', 'Участник события успешно добавлен.');
    }

    public function show(EventParticipant $eventParticipant)
    {
        return view('event-participants.show', compact('eventParticipant'));
    }

    public function edit(EventParticipant $eventParticipant)
    {

        $users = User::all();
        $events = EventParticipant::all();
        return view('event-participants.edit', compact('eventParticipant', 'users', 'events'));
    }

    public function update(Request $request, EventParticipant $eventParticipant)
    {
        $request->validate([
            'event_id' => 'required|exists:commercial_events,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $eventParticipant->update([
            'event_id' => $request->event_id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('event-participants.index')
            ->with('success', 'Участник события успешно обновлен.');
    }

    public function destroy(EventParticipant $eventParticipant)
    {
        $eventParticipant->delete();

        return redirect()->route('event-participants.index')
            ->with('success', 'Участник события успешно удален.');
    }
}
