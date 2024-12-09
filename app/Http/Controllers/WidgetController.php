<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\RawData;
use App\Models\Widget;
use App\Traits\GlobalFunctionTrait as GlobalFunctionTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Config;

class WidgetController extends Controller
{
    use GlobalFunctionTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $farm_idx = $request->route('farm_idx');

        $farms = Farm::with('device')
            ->when($farm_idx, function ($query) use ($farm_idx) {
                return $query->where('idx', $farm_idx);
            })
            ->get();

        $device_ids = $farms->flatMap(function ($farm) {
            return $farm->device->pluck('idx');
        })->unique();

        $widgets = Widget::with('widgetboardtype','widgetconnectiontime')
            ->whereIn('device_idx', $device_ids)
            ->get()
            ->map(function ($widget) {
                $widget_name = $widget->widget_name;

                $datas = $this->BreakdownDiscrimination($widget);


                return [
                    'widget_name' => $widget_name,
                    'warning' => $datas['warning'],
                    'datas' => $datas['data'] ?? [],
                    'cssClass' => $datas['warning'] == 'Y' ? 'crimson' : ''
                ];
            });

            return view('widgets', compact('widgets'));
    }

    public function brokenDevice(Request $request)
    {
        $farm_idx = $request->route('farm_idx');

        $farms = Farm::with('device')
            ->when($farm_idx, function ($query) use ($farm_idx) {
                return $query->where('idx', $farm_idx);
            })
            ->get();

        $device_ids = $farms->flatMap(function ($farm) {
            return $farm->device->pluck('idx');
        })->unique();

        $widgets = Widget::with('widgetboardtype','widgetconnectiontime')
            ->whereIn('device_idx', $device_ids)
            ->get()
            ->map(function ($widget) {
                $widget_name = $widget->widget_name;

                $datas = $this->BreakdownDiscrimination($widget);


                return [
                    'widget_name' => $widget_name,
                    'warning' => $datas['warning'],
                    'datas' => $datas['data'] ?? [],
                    'cssClass' => $datas['warning'] == 'Y' ? 'crimson' : ''
                ];
            })
            ->filter(function ($widget) {
                return $widget['warning'] == 'Y';
            })
            ->values();

            return view('widgets', compact('widgets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Widget $widget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Widget $widget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Widget $widget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Widget $widget)
    {
        //
    }
}
