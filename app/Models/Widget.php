<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    use HasFactory;

    protected $table = 'widget';

    protected $primaryKey = 'idx';

    protected $fillable = [
        'idx',
        'member_idx',
        'widget_name',
        'device_idx',
        'address',
        'board_type',
        'board_number',
        'created_at'
    ];
    public $timestamps = false;

    public function device() {
        return $this->hasMany(Device::class, 'idx', 'device_idx');
    }

    public function widgetboardtype() {
        return $this->hasMany(WidgetBoardType::class, 'widget_idx', 'idx');
    }

    public function widgetconnectiontime() {
        return $this->hasMany(WidgetConnectionTime::class, 'widget_idx', 'idx');
    }
}
