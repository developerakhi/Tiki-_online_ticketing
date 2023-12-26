<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
class Trip extends Model
{
    use HasFactory;
    protected $fillable = [
        'buss_name','fare','available_seats'
    ];
    
    public function location(){
       return $this->hasMany(Location::class);
    }
    public function getFormatTimeStampAttribute(){
        return $this->Dpt_time->format('h:i A');
    }
}
