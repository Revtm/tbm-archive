<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class UserArchive extends Model
{
    use Uuid, HasFactory;

    public $incrementing = false;
    protected $keyType = 'uuid';
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

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
