<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploiDuTempsEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emploi_du_temps_enseignants', function (Blueprint $table) {
            $table->id();

            $table->string('file');
            $table->string('description');
            $table->unsignedBigInteger('enseignant_id');
            $table->foreign('enseignant_id')->references('id')->on('inscription_enseignants');

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
        Schema::dropIfExists('emploi_du_temps_enseignants');
    }
}
