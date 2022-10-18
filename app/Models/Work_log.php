<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work_log extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'work',
        'start_time',
        'end_time',
        'hours_worked'
    ];

    // A user has many worklogs
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
