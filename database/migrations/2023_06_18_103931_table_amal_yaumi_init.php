<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\AmalYaumiMainInit;

class TableAmalYaumiInit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('amal_yaumi_main', function (Blueprint $table) {
          $table->uuid('id');
          $table->uuid('user_id');
          $table->string('status', 1)->default('0');
          $table->timestamps();
          $table->primary('id');
          $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::create('amal_yaumi_mapping', function (Blueprint $table) {
          $table->uuid('id');
          $table->uuid('user_id');
          $table->string('do_date', 10); //YYYY-MM-DD
          $table->string('subuh', 1)->default('0');
          $table->string('dzuhur', 1)->default('0');
          $table->string('ashar', 1)->default('0');
          $table->string('maghrib', 1)->default('0');
          $table->string('isya', 1)->default('0');
          $table->string('dhuha', 1)->default('0');
          $table->string('witir', 1)->default('0');
          $table->string('read_quran', 1)->default('0');
          $table->string('shodaqoh', 1)->default('0');
          $table->string('syukur', 1)->default('0');
          $table->string('doa_for_parent', 1)->default('0');
          $table->string('doa_for_friend', 1)->default('0');
          $table->timestamps();
          $table->primary('id');
          $table->foreign('user_id')->references('id')->on('users');
      });

      AmalYaumiMainInit::run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amal_yaumi_mapping');
        Schema::dropIfExists('amal_yaumi_main');
    }
}
