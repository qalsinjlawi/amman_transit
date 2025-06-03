<?php

namespace App\Http\Controllers;

use App\Models\BusLine;
use Illuminate\Http\Request;

class BusLineController extends Controller
{
    public function index()
    {
        $busLines = BusLine::all();
        return view('bus_lines.index', compact('busLines'));
    }

    public function create()
    {
        return view('bus_lines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'line_number' => 'required|string|max:10|unique:bus_lines',
            'line_name' => 'required|string|max:100',
            'start_station' => 'required|string|max:100',
            'end_station' => 'required|string|max:100',
            'ticket_price' => 'required|numeric|min:0',
            'frequency_minutes' => 'required|integer|min:1',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required|in:active,maintenance,suspended',
        ]);

        BusLine::create($request->all());

        return redirect()->route('bus_lines.index')->with('success', 'تم إنشاء خط الحافلة بنجاح');
    }

    public function show(BusLine $busLine)
    {
        return view('bus_lines.show', compact('busLine'));
    }

    public function edit(BusLine $busLine)
    {
        return view('bus_lines.edit', compact('busLine'));
    }

    public function update(Request $request, BusLine $busLine)
    {
        $request->validate([
            'line_number' => 'required|string|max:10|unique:bus_lines,line_number,' . $busLine->id,
            'line_name' => 'required|string|max:100',
            'start_station' => 'required|string|max:100',
            'end_station' => 'required|string|max:100',
            'ticket_price' => 'required|numeric|min:0',
            'frequency_minutes' => 'required|integer|min:1',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required|in:active,maintenance,suspended',
        ]);

        $busLine->update($request->all());

        return redirect()->route('bus_lines.index')->with('success', 'تم تحديث خط الحافلة بنجاح');
    }

    public function destroy(BusLine $busLine)
    {
        $busLine->delete();
        return redirect()->route('bus_lines.index')->with('success', 'تم حذف خط الحافلة بنجاح');
    }
}