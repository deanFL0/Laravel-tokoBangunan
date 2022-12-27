<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    var $table = 'penjualan';
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->dateTime('tgl');
            $table->unsignedInteger('karyawan_id');
            $table->foreign('karyawan_id')->references('id')->on('karyawan');
        });
    }
    public function down()
    {
        Schema::drop($this->table);
    }
};
