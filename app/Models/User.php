<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'login',
        'email',
        'password',
        'api_token'
    ];
    public $timestamps = false;
    use HasFactory;
}
