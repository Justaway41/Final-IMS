<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    protected $fillable = [
            'name', 'start_date', 'deadline', 'department'
    ];
    use HasFactory;

    // mutators to mutate 
    public function setStartDateAttribute($value){
        $this->attributes['start_date'] = Carbon::createFromFormat('m/d/Y', $value)
            ->format('Y-m-d');
    }
    public function setDeadlineattribute($value){
        $this->attributes['deadline'] = Carbon::createFromFormat('m/d/Y', $value)
            ->format('Y-m-d');
    }

    // relationship with task
    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
