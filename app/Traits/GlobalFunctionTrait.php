<?php

namespace App\Traits;

use App\Models\RawData;
use Carbon\Carbon;
use Config;

trait GlobalFunctionTrait {
    function print_r2($vars)
    {
        echo "<pre>";
        print_r($vars);
        echo "</pre>";
        exit;
    }

    function BreakdownDiscrimination($widget = null)
    {
        $warning = "N";

        if (empty($widget)) return ["warning" => 'Y'];

        $last_raw = RawData::LastOne($widget->address, $widget->board_type, $widget->board_number);

        if (!empty($widget->widgetconnectiontime[0]) && $widget->widgetconnectiontime[0]->check_yn == 'Y') {
            $rawDateTime = Carbon::createFromFormat("Y-m-d H:i:s", $last_raw[0]->created_at);
            $diff = $rawDateTime->diffInMinutes(Carbon::now());

            if ($widget->widgetconnectiontime[0]->check_time <= $diff) {
                $warning = "Y";
            }
        }

        $_datas = Config::get('ewave.datas');
        $datas = array();

        $widgetboardtype = $widget->widgetboardtype->toArray();

        foreach ($_datas as $k => $v) {
            $datas[$k]['name'] = !empty($widgetboardtype) ? $widgetboardtype[0][$v."_name"] : '';
            $datas[$k]['symbol'] = !empty($widgetboardtype) ? $widgetboardtype[0][$v."_symbol"] : '';
            $datas[$k]['display'] = !empty($widgetboardtype) ? $widgetboardtype[0][$v."_display"] : 'N';

            $datas[$k]['data'] = !empty($last_raw[0]->{$v}) ? $last_raw[0]->{$v} : 0;
            $datas[$k]['created_at'] = !empty($last_raw[0]->created_at) ? $last_raw[0]->created_at : '';

            if (!empty($last_raw[0])) {
                if ($widget->widgetboardtype[0]->{$v."_display"} == 'Y' && $last_raw[0]->{$v} == 0) {
                    $warning = "Y";
                }
            } else {
                $warning = "Y";
            }

        }

        return [
            'data' => $datas,
            "warning" => $warning,
        ];

    }
}
