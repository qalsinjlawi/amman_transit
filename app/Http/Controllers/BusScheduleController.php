<?php

namespace App\Http\Controllers;

use App\Models\BusSchedule;
use App\Models\BusLine;
use Illuminate\Http\Request;

class BusScheduleController extends Controller
{
    public function index()
    {
        $busSchedules = BusSchedule::with('busLine')->get();
        return view('bus_schedules.index', compact('busSchedules'));
    }

    public function create()
    {
        $busLines = BusLine::all();
        return view('bus_schedules.create', compact('busLines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'line_id' => 'required|exists:bus_lines,id',
            'departure_time' => 'required',
            'day_type' => 'required|in:weekday,friday,saturday',
            'direction' => 'required|in:forward,backward',
            'is_active' => 'boolean',
        ]);

        BusSchedule::create($request->all());

        return redirect()->route('bus_schedules.index')->with('success', 'تم إنشاء موعد الحافلة بنجاح');
    }

    public function show(BusSchedule $busSchedule)
    {
        $busSchedule->load('busLine');
        return view('bus_schedules.show', compact('busSchedule'));
    }

    public function edit(BusSchedule $busSchedule)
    {
        $busLines = BusLine::all();
        return view('bus_schedules.edit', compact('busSchedule', 'busLines'));
    }

    public function update(Request $request, BusSchedule $busSchedule)
    {
        $request->validate([
            'line_id' => 'required|exists:bus_lines,id',
            'departure_time' => 'required',
            'day_type' => 'required|in:weekday,friday,saturday',
            'direction' => 'required|in:forward,backward',
            'is_active' => 'boolean',
        ]);

        $busSchedule->update($request->all());

        return redirect()->route('bus_schedules.index')->with('success', 'تم تحديث موعد الحافلة بنجاح');
    }

    public function destroy(BusSchedule $busSchedule)
    {
        $busSchedule->delete();
        return redirect()->route('bus_schedules.index')->with('success', 'تم حذف موعد الحافلة بنجاح');
    }
}