<?php

namespace Database\Seeders;
use App\Models\AmalYaumi;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class AmalYaumiMainInit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = DB::table('users')
            ->select('id')
            ->get();

      foreach($users as $user){
        AmalYaumi::create([
          'user_id' => $user->id,
        ]);
      }
    }
}
