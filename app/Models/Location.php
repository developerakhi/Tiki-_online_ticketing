<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'trip_id', 'Dpt_time', 'Arr_time', 'starting_point', 'ending_point', 'date'
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    protected $casts = [
        'Dpt_time' => 'datetime',
        'Arr_time' => 'datetime',
        'dpt_time'=>'datetime',
        'arr_time'=>'datetime'
    ];

}
