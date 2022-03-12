<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    protected $fillable = [
        'name',
        'folder_id',
        'author_id',
        'url'
    ];
    public $timestamps = false;
    use HasFactory;
}
