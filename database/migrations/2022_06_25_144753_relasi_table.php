<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('role');
        });
        Schema::table('absensi', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('ket_id')->nullable();
            $table->foreign('ket_id')->references('id')->on('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role_id']);
            $table->dropForeign(['role_id']);
        });
        Schema::table('absensi', function (Blueprint $table) {
            $table->dropColumn(['user_id']);
            $table->dropColumn(['ket_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['ket_id']);
        });
    }
}
