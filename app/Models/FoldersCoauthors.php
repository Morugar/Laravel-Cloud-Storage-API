<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoldersCoauthors extends Model
{
    protected $table = 'folderscoauthors';
    protected $fillable = [
        'user_id',
        'folder_id'
    ];
    public $timestamps = false;
    use HasFactory;
}
