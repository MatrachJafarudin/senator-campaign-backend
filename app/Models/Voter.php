<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_imei',
        'area_id',
        'image'
    ];

    public function area() {
        return $this->belongsTo(Area::class);
    }
}
