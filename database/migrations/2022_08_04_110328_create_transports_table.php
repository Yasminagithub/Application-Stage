<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employe_id')->constrained('employes')->cascadeOnDelete();
            $table->string('Immatriculation',60)->unique();
            $table->string('Marque',60);
            $table->date('Date_fin_Vignette');
            $table->date('Date_Visite_Assurance_Debut');
            $table->date('Date_Visite_Assurance_Fin');
            $table->date('Date_Visite_technique_Fin');
            $table->date('Date_Visite_equipement_Fin');
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
        Schema::dropIfExists('transports');
    }
};
