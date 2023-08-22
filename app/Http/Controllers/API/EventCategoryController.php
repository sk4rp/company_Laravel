<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\EventCategoryResource;
use App\Models\EventCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class EventCategoryController extends Controller
{
    public function index()
    {
        $categories = EventCategory::with('parent')->get();
        return response()->json(['data' => EventCategoryResource::collection($categories)], Response::HTTP_OK);
    }

    public function show(EventCategory $eventCategory)
    {
        return response()->json(['data' => new EventCategoryResource($eventCategory)], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|integer|exists:event_categories,id',
        ]);

        $eventCategory = EventCategory::create($data);

        return response()->json(['data' => new EventCategoryResource($eventCategory)], Response::HTTP_CREATED);
    }

    public function update(Request $request, EventCategory $eventCategory)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|integer|exists:event_categories,id',
        ]);

        $eventCategory->update($data);

        return response()->json(['data' => new EventCategoryResource($eventCategory)], Response::HTTP_OK);
    }

    public function destroy(EventCategory $eventCategory)
    {
        $eventCategory->delete();

        return response()->json(['message' => 'Категория событий успешно удалена'], Response::HTTP_NO_CONTENT);
    }

    public function createParent()
    {
        $categories = EventCategory::whereNull('parent_id')->get();
        return response()->json(['data' => EventCategoryResource::collection($categories)], Response::HTTP_OK);
    }

    public function storeParent(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $eventCategory = EventCategory::create([
            'name' => $data['name'],
            'parent_id' => null,
        ]);

        return response()->json(['data' => new EventCategoryResource($eventCategory)], Response::HTTP_CREATED);
    }

    public function deleteParent()
    {
        $categories = EventCategory::whereNull('parent_id')->get();
        return response()->json(['data' => EventCategoryResource::collection($categories)], Response::HTTP_OK);
    }

    public function destroyParent(Request $request)
    {
        $selectedCategoryId = $request->input('parent_id');

        $hasChildren = EventCategory::where('parent_id', $selectedCategoryId)->exists();

        if ($hasChildren) {
            return response()->json(['error' => 'Вы не можете удалить родительскую категорию, поскольку существуют мероприятия с этой категорией.'], Response::HTTP_BAD_REQUEST);
        }

        EventCategory::where('id', $selectedCategoryId)->delete();

        return response()->json(['message' => 'Родительская категория успешно удалена'], Response::HTTP_NO_CONTENT);
    }
}
