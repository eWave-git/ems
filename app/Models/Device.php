<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $table = 'device';
    protected $primaryKey = 'idx';
    protected $fillable = [
        'idx',
        'farm_idx',
        'device_name',
        'address',
        'board_type',
        'board_number',
        'created_at'
    ];
    public $timestamps = false;

    public function widget() {
        return $this->hasMany(Widget::class, 'device_idx', 'idx');
    }
}
