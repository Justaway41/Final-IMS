<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'assign_to', 'todo', 'deadline', 'project_id'
    ];

    // setting deadline date format
    public function setDeadlineAttribute($value){
        $this->attributes['deadline']=Carbon::createFromFormat('m/d/Y', $value)
            ->format('Y-m-d');
    }


    // relationship with project
    public function projects(){
        $this->belongsTo(Project::class);
    }

}
