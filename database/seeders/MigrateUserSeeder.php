<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MigrateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = DB::table('users')
            ->select('id', 'id_')
            ->get();
      $user_archives = DB::table('user_archive')
            ->select('id', 'id_')
            ->get();

      foreach($users as $user){
        DB::table('users')
            ->where('id', '=', $user->id)
            ->update(['id_' => Str::uuid()]);
      }

      $usersUp = DB::table('users')
            ->select('id', 'id_')
            ->get();

      foreach($usersUp as $user){
        DB::table('user_archive')
                  ->where('user_id', '=', $user->id)
                  ->update(['user_id_' => $user->id_]);
      }

      foreach($user_archives as $user_archive){
        DB::table('user_archive')
            ->where('id', '=', $user_archive->id)
            ->update(['id_' => Str::uuid()]);
      }
    }
}
