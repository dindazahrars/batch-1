<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $guard = ['id'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'photo_profile',
        'status',
    ];
}
