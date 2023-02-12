<?php

namespace App\Models;

use App\Enums\TableLocation;
use App\Enums\TableStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = ['table_number', 'guest_count', 'status', 'location', 'restaurant_id'];

    protected $casts = [
        'status' => TableStatus::class, 
        'location' => TableLocation::class
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
