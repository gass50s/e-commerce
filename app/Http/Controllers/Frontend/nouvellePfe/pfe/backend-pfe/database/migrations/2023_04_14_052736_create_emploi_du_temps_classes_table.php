<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploiDuTempsClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emploi_du_temps_classes', function (Blueprint $table) {
            $table->id();
            
            $table->string('file');
            $table->string('description');
            $table->unsignedBigInteger('classe_id');
            $table->foreign('classe_id')->references('id')->on('attributions');

            $table->unsignedBigInteger('annee_scolaire_id');
            $table->foreign('annee_scolaire_id')->references('id')->on('année_scolaires');
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
        Schema::dropIfExists('emploi_du_temps_classes');
    }
}
