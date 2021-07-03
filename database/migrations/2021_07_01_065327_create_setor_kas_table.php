<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetorKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setor_kas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->text('keterangan');
            $table->string('saldo')->unique();
            $table->text('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setor_kas');
    }
}
