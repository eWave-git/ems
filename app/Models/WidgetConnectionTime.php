<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetConnectionTime extends Model
{
    protected $table = 'widget_connection_time';
    protected $primaryKey = 'idx';
    protected $fillable = [
        'widget_idx',
        'check_yn',
        'check_time',
        'created_at'
    ];
    use HasFactory;
    public $timestamps = false;

    public function widget() {
        return $this->hasMany(Widget::class, 'idx', 'widget_idx', );
    }
}
