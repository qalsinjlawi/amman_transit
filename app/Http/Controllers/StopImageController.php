<?php

namespace App\Http\Controllers;

use App\Models\StopImage;
use App\Models\BusStop;
use App\Models\User;
use Illuminate\Http\Request;

class StopImageController extends Controller
{
    public function index()
    {
        $stopImages = StopImage::with(['busStop', 'user'])->get();
        return view('stop_images.index', compact('stopImages'));
    }

    public function create()
    {
        $busStops = BusStop::all();
        $users = User::all();
        return view('stop_images.create', compact('busStops', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stop_id' => 'required|exists:bus_stops,id',
            'user_id' => 'required|exists:users,id',
            'image_url' => 'required|string|max:255',
            'caption' => 'nullable|string',
            'is_approved' => 'boolean',
        ]);

        StopImage::create($request->all());

        return redirect()->route('stop_images.index')->with('success', 'تم إنشاء صورة المحطة بنجاح');
    }

    public function show(StopImage $stopImage)
    {
        $stopImage->load(['busStop', 'user']);
        return view('stop_images.show', compact('stopImage'));
    }

    public function edit(StopImage $stopImage)
    {
        $busStops = BusStop::all();
        $users = User::all();
        return view('stop_images.edit', compact('stopImage', 'busStops', 'users'));
    }

    public function update(Request $request, StopImage $stopImage)
    {
        $request->validate([
            'stop_id' => 'required|exists:bus_stops,id',
            'user_id' => 'required|exists:users,id',
            'image_url' => 'required|string|max:255',
            'caption' => 'nullable|string',
            'is_approved' => 'boolean',
        ]);

        $stopImage->update($request->all());

        return redirect()->route('stop_images.index')->with('success', 'تم تحديث صورة المحطة بنجاح');
    }

    public function destroy(StopImage $stopImage)
    {
        $stopImage->delete();
        return redirect()->route('stop_images.index')->with('success', 'تم حذف صورة المحطة بنجاح');
    }
}