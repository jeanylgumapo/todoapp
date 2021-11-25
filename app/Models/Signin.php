<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signin extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable=[
        'username',
        'fullname',
        'role',
        'password',
    ];
}
