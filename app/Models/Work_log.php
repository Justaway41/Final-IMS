<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
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
        'hours_worked',
        'created_at',
    ];

    protected $casts = [
        'start_time' => AsArrayObject::class,
        'end_time' => AsArrayObject::class,
    ];
    // A user has many worklogs
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
