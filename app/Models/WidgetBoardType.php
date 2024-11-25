<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetBoardType extends Model
{
    protected $table = 'widget_board_type';
    protected $primaryKey = 'idx';
    protected $fillable = [
        'widget_idx',
        'data1_display',
        'data1_name',
        'data1_symbol',
        'data2_display',
        'data2_name',
        'data2_symbol',
        'data3_display',
        'data3_name',
        'data3_symbol',
        'data4_display',
        'data4_name',
        'data4_symbol',
        'created_at'
    ];
    public $timestamps = false;

    use HasFactory;

    public function widget() {
        return $this->hasMany(Widget::class, 'idx', 'widget_idx', );
    }
}
