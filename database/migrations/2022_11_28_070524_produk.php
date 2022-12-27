<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    var $table = 'produk';
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('produk', 30);
            $table->double('harga');
            $table->unsignedInteger('stok');
        });
    }
    public function down()
    {
        Schema::drop($this->table);
    }
};
