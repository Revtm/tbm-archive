<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Database\Seeders\MigrateUserSeeder;

class TableAmalYaumi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->after('id', function ($table) {
            $table->uuid('id_')->nullable();
        });
      });

      Schema::table('user_archive', function (Blueprint $table) {
        $table->after('user_id', function ($table) {
            $table->uuid('id_')->nullable();
            $table->uuid('user_id_')->nullable();
        });
      });

      MigrateUserSeeder::run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      // Schema::table('users', function (Blueprint $table) {
      //   $table->after('id', function ($table) {
      //       $table->dropColumn('id_');
      //   });
      // });
      //
      // Schema::table('user_archive', function (Blueprint $table) {
      //   $table->after('id', function ($table) {
      //       $table->dropColumn(['id_', 'user_id_']);
      //   });
      // });
    }
}
