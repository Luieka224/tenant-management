<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'last_name',
        'first_name',
        'last_name',
        'balance',
        'last_paid'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
