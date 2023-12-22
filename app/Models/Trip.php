<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['date', 'departure', 'destination'];
    
    public function seatAllocations()
    {
        return $this->hasMany(SeatAllocation::class);
    }
}
