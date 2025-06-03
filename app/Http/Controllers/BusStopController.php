<?php

namespace App\Http\Controllers;

use App\Models\BusStop;
use Illuminate\Http\Request;

class BusStopController extends Controller
{
    public function index()
    {
        $busStops = BusStop::all();
        return view('bus_stops.index', compact('busStops'));
    }

    public function create()
    {
        return view('bus_stops.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'stop_name' => 'required|string|max:100',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'address' => 'nullable|string',
            'area' => 'nullable|string|max:50',
            'status' => 'required|in:active,maintenance,closed',
            'operating_hours' => 'required|string|max:50',
        ]);

        BusStop::create($request->all());

        return redirect()->route('bus_stops.index')->with('success', 'تم إنشاء المحطة بنجاح');
    }

    public function show(BusStop $busStop)
    {
        return view('bus_stops.show', compact('busStop'));
    }

    public function edit(BusStop $busStop)
    {
        return view('bus_stops.edit', compact('busStop'));
    }

    public function update(Request $request, BusStop $busStop)
    {
        $request->validate([
            'stop_name' => 'required|string|max:100',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'address' => 'nullable|string',
            'area' => 'nullable|string|max:50',
            'status' => 'required|in:active,maintenance,closed',
            'operating_hours' => 'required|string|max:50',
        ]);

        $busStop->update($request->all());

        return redirect()->route('bus_stops.index')->with('success', 'تم تحديث المحطة بنجاح');
    }

    public function destroy(BusStop $busStop)
    {
        $busStop->delete();
        return redirect()->route('bus_stops.index')->with('success', 'تم حذف المحطة بنجاح');
    }
}