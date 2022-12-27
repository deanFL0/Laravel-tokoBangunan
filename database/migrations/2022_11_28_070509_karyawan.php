<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    var $table = 'karyawan';
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nama', 30);
            $table->char('gender', 1);
            $table->string('sandi', 255);
        });
    }
    public function down()
    {
        Schema::drop($this->table);
    }
};
