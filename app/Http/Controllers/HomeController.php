<?php

namespace App\Http\Controllers;

use App\Models\BusStop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * عرض الصفحة الرئيسية
     */
    public function index()
    {
        // جلب المحطات النشطة لعرضها في قسم المحطات المميزة
        $stations = BusStop::where('status', 'active')->get();
        
        // تمرير البيانات إلى العرض
        return view('Home.index', compact('stations'));
    }
}