<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class AmalYaumi extends Model
{
  use Uuid, HasFactory;

  public $incrementing = false;
  protected $keyType = 'uuid';
  protected $table = 'amal_yaumi_main';
  protected $primaryKey = 'id';
  protected $fillable = [
      'user_id',
      'status',
  ];
}
