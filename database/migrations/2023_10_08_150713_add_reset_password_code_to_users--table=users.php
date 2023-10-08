<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
          $table->char('reset_password_code', 64)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table){
        $table->dropColumn('reset_password_code');
      });
    }
};
