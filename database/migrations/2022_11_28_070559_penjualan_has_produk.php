<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    var $table = 'penjualan_has_produk';
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedInteger('penjualan_id');
            $table->unsignedInteger('produk_id');
            $table->integer('qty');
            $table->double('harga');
            $table->foreign('penjualan_id')->references('id')->on('penjualan');
            $table->foreign('produk_id')->references('id')->on('produk');
        });
    }
    public function down()
    {
        Schema::drop($this->table);
    }
};
