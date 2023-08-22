<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\EventParticipantResource;
use App\Models\EventParticipant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class EventParticipantController extends Controller
{
    public function index()
    {
        $participants = EventParticipant::with('user')->get();
        return response()->json(['data' => EventParticipantResource::collection($participants)], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:commercial_events,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $participant = EventParticipant::create([
            'event_id' => $request->event_id,
            'user_id' => $request->user_id,
        ]);

        return response()->json(['data' => new EventParticipantResource($participant)], Response::HTTP_CREATED);
    }

    public function show(EventParticipant $eventParticipant)
    {
        return response()->json(['data' => new EventParticipantResource($eventParticipant)], Response::HTTP_OK);
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

        return response()->json(['data' => new EventParticipantResource($eventParticipant)], Response::HTTP_OK);
    }

    public function destroy(EventParticipant $eventParticipant)
    {
        $eventParticipant->delete();

        return response()->json(['message' => 'Участник события успешно удален'], Response::HTTP_OK);
    }
}
