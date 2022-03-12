<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $table = 'folders';
    protected $fillable = [
        'name',
        'parent_id',
        'author_id'
    ];
    public $timestamps = false;
    use HasFactory;
}
