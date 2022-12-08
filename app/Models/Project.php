<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    protected $fillable = [
        'name', 'start_date', 'end_date'
    ];
    use HasFactory;



    // relationship with task
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
