<?php

namespace App\Http\Controllers;

use App\Models\LineStop;
use App\Models\BusLine;
use App\Models\BusStop;
use Illuminate\Http\Request;

class LineStopController extends Controller
{
    public function index()
    {
        $lineStops = LineStop::with(['busLine', 'busStop'])->get();
        return view('line_stops.index', compact('lineStops'));
    }

    public function create()
    {
        $busLines = BusLine::all();
        $busStops = BusStop::all();
        return view('line_stops.create', compact('busLines', 'busStops'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'line_id' => 'required|exists:bus_lines,id',
            'stop_id' => 'required|exists:bus_stops,id',
            'stop_order' => 'required|integer|min:1',
            'direction' => 'required|in:forward,backward',
            'arrival_time_offset' => 'nullable|integer|min:0',
        ]);

        LineStop::create($request->all());

        return redirect()->route('line_stops.index')->with('success', 'تم إنشاء محطة الخط بنجاح');
    }

    public function show(LineStop $lineStop)
    {
        $lineStop->load(['busLine', 'busStop']);
        return view('line_stops.show', compact('lineStop'));
    }

    public function edit(LineStop $lineStop)
    {
        $busLines = BusLine::all();
        $busStops = BusStop::all();
        return view('line_stops.edit', compact('lineStop', 'busLines', 'busStops'));
    }

    public function update(Request $request, LineStop $lineStop)
    {
        $request->validate([
            'line_id' => 'required|exists:bus_lines,id',
            'stop_id' => 'required|exists:bus_stops,id',
            'stop_order' => 'required|integer|min:1',
            'direction' => 'required|in:forward,backward',
            'arrival_time_offset' => 'nullable|integer|min:0',
        ]);

        $lineStop->update($request->all());

        return redirect()->route('line_stops.index')->with('success', 'تم تحديث محطة الخط بنجاح');
    }

    public function destroy(LineStop $lineStop)
    {
        $lineStop->delete();
        return redirect()->route('line_stops.index')->with('success', 'تم حذف محطة الخط بنجاح');
    }
}