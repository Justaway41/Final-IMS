<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'department_name',
    ];

    public function Users()
    {
        return $this->hasMany(User::class);
    }
}
