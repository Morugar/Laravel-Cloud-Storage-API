<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilesCoauthors extends Model
{
    protected $table = 'filescoauthors';
    protected $fillable = [
        'user_id',
        'file_id'
    ];
    public $timestamps = false;
    use HasFactory;
}
