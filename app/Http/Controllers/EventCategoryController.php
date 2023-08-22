<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EventCategoryController extends Controller
{
    public function index()
    {
        $categories = EventCategory::with('parent')->get();
        return view('event-categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = EventCategory::whereNull('parent_id')->get();;
        return view('event-categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|integer|exists:event_categories,id',
        ]);

        EventCategory::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('event-categories.index')
            ->with('success', 'Категория мероприятия успешно создана.');
    }

    public function show(EventCategory $eventCategory)
    {
        return view('event-categories.show', compact('eventCategory'));
    }

    public function edit(EventCategory $eventCategory)
    {
        $categories = EventCategory::whereNull('parent_id')->get();;
        return view('event-categories.edit', compact('eventCategory', 'categories'));
    }

    public function update(Request $request, EventCategory $eventCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|integer|exists:event_categories,id',
        ]);

        $eventCategory->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('event-categories.index')
            ->with('success', 'Категория мероприятия успешно обновлена.');
    }

    public function destroy(EventCategory $eventCategory)
    {
        $eventCategory->delete();

        return redirect()->route('event-categories.index')
            ->with('success', 'Категория мероприятия успешно удалена.');
    }

    public function createParent()
    {
        return view('event-categories.create-parent');
    }

    public function storeParent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        EventCategory::create([
            'name' => $request->input('name'),
            'parent_id' => null,
        ]);

        return redirect()->route('event-categories.index')
            ->with('success', 'Родительская категория успешно создана.');
    }

    public function deleteParent()
    {
        $categories = EventCategory::whereNull('parent_id')->get();
        return view('event-categories.delete-parent', compact('categories'));
    }

    public function destroyParent(Request $request)
    {
        $selectedCategoryId = $request->input('parent_id');

        $hasChildren = EventCategory::where('parent_id', $selectedCategoryId)->exists();

        if ($hasChildren) {
            return redirect()->back()->with('error', 'Вы не можете удалить родительскую категорию, поскольку существует мероприятие с этой категорией   .');
        }

        EventCategory::where('id', $selectedCategoryId)->delete();

        return redirect()->route('event-categories.index')->with('success', 'Родительская категория успешно удалена.');
    }

}
