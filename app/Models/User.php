<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'photo',
        'birthday',
        'contact',
        'address',
        'department_id',
        'role_id',
        'contract_status',
        'contract_start_date',
        'contract_end_date',
        'hourly_rate'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // A user belongs to a department
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    // A user belongs to a role.
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function Worklogs()
    {
        return $this->hasMany(Work_log::class);
    }

    public function latestWorklog()
    {
        return $this->hasMany(Work_log::class)->latest();
    }
}
