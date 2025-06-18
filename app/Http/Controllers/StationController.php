<?php

namespace App\Http\Controllers;

use App\Models\BusStop;
use App\Models\BusLine;
use App\Models\BusSchedule;
use App\Models\LineStop;
use App\Models\StopImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StationController extends Controller
{
    /**
     * عرض قائمة جميع المحطات
     */
    public function index()
    {
        $stations = BusStop::all();
        return view('stations.index', compact('stations'));
    }

    /**
     * عرض نموذج إنشاء محطة جديدة
     */
    public function create()
    {
        return view('stations.create');
    }

    /**
     * حفظ محطة جديدة في قاعدة البيانات
     */
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

        return redirect()->route('stations.index')->with('success', 'تم إنشاء المحطة بنجاح');
    }

    /**
     * عرض تفاصيل محطة واحدة (الصفحة الشاملة)
     */
    public function show(BusStop $station)
    {
        // جلب الخطوط التي تمر بهذه المحطة مع تفاصيلها
        $relatedLines = BusLine::whereHas('lineStops', function($query) use ($station) {
            $query->where('stop_id', $station->id);
        })->with([
            'lineStops' => function($query) use ($station) {
                $query->where('stop_id', $station->id);
            }
        ])->get();

        // جلب جميع محطات الخطوط المرتبطة بهذه المحطة
        $lineStops = LineStop::where('stop_id', $station->id)
            ->with(['busLine', 'busStop'])
            ->orderBy('stop_order')
            ->get();

        // جلب الجداول الزمنية للخطوط المرتبطة
        $schedules = collect();
        if ($relatedLines->count() > 0) {
            $schedules = BusSchedule::whereIn('line_id', $relatedLines->pluck('id'))
                ->with('busLine')
                ->where('is_active', true)
                ->orderBy('departure_time')
                ->get();
        }

        // جلب صور هذه المحطة المعتمدة
        $stationImages = StopImage::where('stop_id', $station->id)
            ->where('is_approved', true)
            ->with(['user', 'busStop'])
            ->orderBy('created_at', 'desc')
            ->get();

        // جلب جميع محطات كل خط للعرض التفصيلي
        $allLineStops = collect();
        foreach ($relatedLines as $line) {
            $lineStopsForThisLine = LineStop::where('line_id', $line->id)
                ->with(['busStop'])
                ->orderBy('direction')
                ->orderBy('stop_order')
                ->get();
            $allLineStops = $allLineStops->merge($lineStopsForThisLine);
        }

        // جلب المحطات القريبة جغرافياً
        $nearbyStations = $this->getNearbyStations($station);

        // حساب الإحصائيات
        $stats = [
            'total_lines' => $relatedLines->count(),
            'active_schedules' => $schedules->count(),
            'total_images' => $stationImages->count(),
            'nearby_stations_count' => $nearbyStations->count(),
            'forward_lines' => $lineStops->where('direction', 'forward')->count(),
            'backward_lines' => $lineStops->where('direction', 'backward')->count(),
            'peak_hours_schedules' => $schedules->whereBetween('departure_time', ['07:00:00', '09:00:00'])->count() +
                                   $schedules->whereBetween('departure_time', ['17:00:00', '19:00:00'])->count(),
        ];

        // تجميع الجداول حسب نوع اليوم
        $schedulesByDay = [
            'weekday' => $schedules->where('day_type', 'weekday'),
            'friday' => $schedules->where('day_type', 'friday'),
            'saturday' => $schedules->where('day_type', 'saturday'),
        ];

        // تجميع الصور حسب المستخدم
        $imagesByUser = $stationImages->groupBy('user_id');

        return view('stations.show', compact(
            'station',
            'relatedLines',
            'lineStops',
            'schedules',
            'schedulesByDay',
            'stationImages',
            'imagesByUser',
            'allLineStops',
            'nearbyStations',
            'stats'
        ));
    }

    /**
     * عرض نموذج تعديل المحطة
     */
    public function edit(BusStop $station)
    {
        return view('stations.edit', compact('station'));
    }

    /**
     * تحديث بيانات المحطة
     */
    public function update(Request $request, BusStop $station)
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

        $station->update($request->all());

        return redirect()->route('stations.show', $station)->with('success', 'تم تحديث المحطة بنجاح');
    }

    /**
     * حذف المحطة
     */
    public function destroy(BusStop $station)
    {
        // التحقق من وجود بيانات مرتبطة
        $hasRelatedData = LineStop::where('stop_id', $station->id)->exists() ||
                         StopImage::where('stop_id', $station->id)->exists();

        if ($hasRelatedData) {
            return redirect()->route('stations.index')
                ->with('error', 'لا يمكن حذف المحطة لوجود بيانات مرتبطة بها');
        }

        $station->delete();
        return redirect()->route('stations.index')->with('success', 'تم حذف المحطة بنجاح');
    }

    /**
     * جلب المحطات القريبة جغرافياً
     */
    private function getNearbyStations(BusStop $station, $radiusKm = 2)
    {
        return BusStop::where('id', '!=', $station->id)
            ->where('status', 'active')
            ->selectRaw("
                *,
                (6371 * acos(
                    cos(radians(?)) * 
                    cos(radians(latitude)) * 
                    cos(radians(longitude) - radians(?)) + 
                    sin(radians(?)) * 
                    sin(radians(latitude))
                )) AS distance
            ", [$station->latitude, $station->longitude, $station->latitude])
            ->having('distance', '<', $radiusKm)
            ->orderBy('distance')
            ->limit(10)
            ->get();
    }

    /**
     * جلب الجداول الزمنية التالية لهذه المحطة
     */
    public function getUpcomingSchedules(BusStop $station, $limit = 5)
    {
        $currentTime = now()->format('H:i:s');
        $currentDayType = $this->getCurrentDayType();

        $relatedLineIds = LineStop::where('stop_id', $station->id)
            ->pluck('line_id')
            ->unique();

        return BusSchedule::whereIn('line_id', $relatedLineIds)
            ->where('day_type', $currentDayType)
            ->where('departure_time', '>', $currentTime)
            ->where('is_active', true)
            ->with('busLine')
            ->orderBy('departure_time')
            ->limit($limit)
            ->get();
    }

    /**
     * تحديد نوع اليوم الحالي
     */
    private function getCurrentDayType()
    {
        $dayOfWeek = now()->dayOfWeek;
        
        if ($dayOfWeek == 5) { // Friday
            return 'friday';
        } elseif ($dayOfWeek == 6) { // Saturday
            return 'saturday';
        } else { // Sunday to Thursday
            return 'weekday';
        }
    }

    /**
     * إحصائيات متقدمة للمحطة
     */
    public function getStationAnalytics(BusStop $station)
    {
        $relatedLineIds = LineStop::where('stop_id', $station->id)->pluck('line_id');

        return [
            'busiest_hours' => $this->getBusiestHours($relatedLineIds),
            'daily_frequency' => $this->getDailyFrequency($relatedLineIds),
            'line_popularity' => $this->getLinePopularity($relatedLineIds),
            'image_activity' => $this->getImageActivity($station->id)
        ];
    }

    /**
     * حساب أكثر الساعات ازدحاماً
     */
    private function getBusiestHours($lineIds)
    {
        return BusSchedule::whereIn('line_id', $lineIds)
            ->where('is_active', true)
            ->selectRaw('HOUR(departure_time) as hour, COUNT(*) as count')
            ->groupBy('hour')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();
    }

    /**
     * حساب تكرار الخدمة اليومي
     */
    private function getDailyFrequency($lineIds)
    {
        return BusSchedule::whereIn('line_id', $lineIds)
            ->where('is_active', true)
            ->selectRaw('day_type, COUNT(*) as schedules_count')
            ->groupBy('day_type')
            ->get();
    }

    /**
     * شعبية الخطوط
     */
    private function getLinePopularity($lineIds)
    {
        return BusLine::whereIn('id', $lineIds)
            ->withCount('busSchedules')
            ->orderBy('bus_schedules_count', 'desc')
            ->get();
    }

    /**
     * نشاط الصور
     */
    private function getImageActivity($stationId)
    {
        return StopImage::where('stop_id', $stationId)
            ->where('is_approved', true)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as images_count')
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->limit(30)
            ->get();
    }
}