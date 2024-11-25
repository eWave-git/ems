<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $table = 'farm';

    protected $primaryKey = 'idx';
    protected $fillable = [
        'idx',
        'farm_name',
        'farm_ceo',
        'farm_address',
        'member_idx',
        'created_at'
    ];

    public $timestamps = false;

    public function device() {
        return $this->hasMany(Device::class, 'farm_idx', 'idx');
    }
}
