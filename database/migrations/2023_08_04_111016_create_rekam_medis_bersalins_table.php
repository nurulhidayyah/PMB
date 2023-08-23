<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedisBersalinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis_bersalins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->string('tekanan_darah')->nullable();
            $table->string('uk')->nullable();
            $table->string('prest')->nullable();
            $table->string('tp')->nullable();
            $table->string('hppt')->nullable();
            $table->string('gravida')->nullable();
            $table->string('lila')->nullable();
            $table->string('djj')->nullable();
            $table->string('tfu')->nullable();
            $table->string('berat_bayi')->nullable();
            $table->string('diagnosa')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('rekam_medis_bersalins');
    }
}
