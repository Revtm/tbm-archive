<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class AmalYaumiMapping extends Model
{
  use Uuid, HasFactory;

  public $incrementing = false;
  protected $keyType = 'uuid';
  protected $table = 'amal_yaumi_mapping';
  protected $primaryKey = 'id';
  protected $fillable = [
      'user_id',
      'do_date',
      'subuh',
      'dzuhur',
      'ashar',
      'maghrib',
      'isya',
      'dhuha',
      'witir',
      'read_quran',
      'shodaqoh',
      'syukur',
      'doa_for_parent',
      'doa_for_friend'
  ];
  // $date=date_create();
  // date_sub($date,date_interval_create_from_date_string("7 days"));
  // echo date_format($date,"Y-m-d");
}
