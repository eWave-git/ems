<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawData extends Model
{
    use HasFactory;

    protected $table = 'raw_data';
    protected $primaryKey = 'idx';
    protected $fillable = [
        'address',
        'board_type',
        'board_number',
        'data1',
        'data2',
        'data3',
        'data4',
        'hw_cnt',
        'created_at'
    ];
    public $timestamps = false;

    public function scopeLastOne($query, $address, $board_type, $board_number) {
//        return $query->where('address', $address)->where('board_type', $board_type)->where('board_number', $board_number)->orderBy('idx', 'desc')->first(['data1','data2','data3','data4','created_at']);
        return $query->where('address', $address)->where('board_type', $board_type)->where('board_number', $board_number)->orderBy('idx', 'desc')->limit(1)->get(['data1','data2','data3','data4','created_at']);
    }
}
