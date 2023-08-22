<?php

namespace App\Http\Controllers\API;
use App\Http\Resources\UserEventResource;
use App\Models\UserEvent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class UserEventController extends Controller
{
    public function index()
    {
        $userEvents = UserEvent::all();
        return response()->json(['data' => UserEventResource::collection($userEvents)], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required|string',
            'min_participants' => 'required|integer|min:1',
            'max_participants' => 'required|integer|min:1|gt:min_participants',
            'min_age' => 'required|integer|min:0',
            'max_age' => 'required|integer|min:10',
            'gender_specific' => 'boolean',
        ]);

        $userEvent = UserEvent::create($request->all());

        return response()->json(['data' => new UserEventResource($userEvent)], Response::HTTP_CREATED);
    }

    public function show(UserEvent $userEvent)
    {
        return response()->json(['data' => new UserEventResource($userEvent)], Response::HTTP_OK);
    }

    public function update(Request $request, UserEvent $userEvent)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required|string',
            'min_participants' => 'required|integer|min:1',
            'max_participants' => 'required|integer|min:1|gt:min_participants',
            'min_age' => 'required|integer|min:0',
            'max_age' => 'required|integer|min:10',
            'gender_specific' => 'boolean',
        ]);

        $userEvent->update($request->all());

        return response()->json(['data' => new UserEventResource($userEvent)], Response::HTTP_OK);
    }

    public function destroy(UserEvent $userEvent)
    {
        $userEvent->delete();
        return response()->json(['message' => 'Пользовательское событие успешно удалено'], Response::HTTP_OK);
    }
}
