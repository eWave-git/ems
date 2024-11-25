<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\RawData;
use App\Models\Widget;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;
use Config;
use App\Traits\GlobalFunctionTrait as GlobalFunctionTrait;

class FarmController extends Controller
{
    use GlobalFunctionTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farms = Farm::with('device')

            ->get()
            ->map(function ($farm) {

                $farm_name = $farm->farm_name;
                $device_count = $farm->device->count();

                $device = $farm->device->map(function ($device)  {
                    $widget = Widget::with('widgetboardtype','widgetconnectiontime')
                        ->where('device_idx', $device->idx)->first();

                    return [
                        'warning' => $this->BreakdownDiscrimination($widget)['warning'] ?? 'Y',
                    ];
                });

                $counts = $device->countBy('warning');

                return [
                    'farm_idx' => $farm->idx,
                    'farm_name' => $farm_name,
                    'device_count' => $device_count,
                    'abnormal' => $counts['Y'] ?? 0,
                    'normal' => $counts['N'] ?? 0,
                ];
            });

        return view('farms', compact('farms'));
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
    public function show(Farm $farm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Farm $farm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Farm $farm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Farm $farm)
    {
        //
    }
}
