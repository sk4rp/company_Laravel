<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\CommercialEventResource;
use App\Models\CommercialEvent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class CommercialEventController extends Controller
{
    public function index()
    {
        $commercialEvents = CommercialEvent::all();
        return response()->json(['data' => CommercialEventResource::collection($commercialEvents)], Response::HTTP_OK);
    }

    public function show(CommercialEvent $commercialEvent)
    {
        return response()->json(['data' => new CommercialEventResource($commercialEvent)], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'event_date' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        $commercialEvent = CommercialEvent::create($data);

        return response()->json(['data' => new CommercialEventResource($commercialEvent)], Response::HTTP_CREATED);
    }

    public function update(Request $request, CommercialEvent $commercialEvent)
    {
        $data = $request->validate([
            'title' => 'required',
            'event_date' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        $commercialEvent->update($data);

        return response()->json(['data' => new CommercialEventResource($commercialEvent)], Response::HTTP_OK);
    }

    public function destroy(CommercialEvent $commercialEvent)
    {
        $commercialEvent->delete();

        return response()->json(['message' => 'Коммерческое событие успешно удалено'], Response::HTTP_NO_CONTENT);
    }
}
