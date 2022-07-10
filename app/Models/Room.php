<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'floor_id',
        'user_id',
        'room_type_id',
        'number',
        'no_of_bed',
        'price',
        'is_available'
    ];

    public function floor() {
        return $this->belongsTo(Floor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room_type()
    {
        return $this->belongsTo(RoomType::class);
    }
}