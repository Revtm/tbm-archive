<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserArchive extends Model
{
    use HasFactory;
    protected $table = 'user_archive';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'archive_type',
        'source',
        'archive_origin',
        'captions',
        'likes',
    ];
}
