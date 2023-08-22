<?php

namespace App\Http\Controllers;

use App\Models\UserEvent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserEventController extends Controller
{

    public function index()
    {
        $userEvents = UserEvent::all();
        return view('user-events.index', compact('userEvents'));
    }


    public function create()
    {
        return view('user-events.create');
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
            'max_age' => 'required|integer|min:0',
            'gender_specific' => 'boolean',
        ]);

        UserEvent::create($request->all());
        return redirect()->route('user-events.index');
    }


    public function show(UserEvent $userEvent)
    {
        return view('user-events.show', compact('userEvent'));
    }


    public function edit(UserEvent $userEvent)
    {
        return view('user-events.edit', compact('userEvent'));
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

        return redirect()->route('user-events.index')->with('success', 'Пользовательское событие обновлено.');
    }


    public function destroy(UserEvent $userEvent)
    {
        $userEvent->delete();
        return redirect()->route('user-events.index')->with('success', 'Пользовательское событие удалено.');
    }
}
