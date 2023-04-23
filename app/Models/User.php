<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'role',
        'status',
        'current_balance',
        'earning_balance',
        'package_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
