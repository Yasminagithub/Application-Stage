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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('CIN',60)->unique();
            $table->string('Nom_employe',60);
            $table->string('Prenom_employe',60);
            $table->date('Date_Naissance',60);
            $table->string('Numero_Tel',60);
            $table->string('Email',60)->nullable(true);
            $table->string('Diplome',60)->nullable(true);
            $table->string('Profession',60);
            $table->date('Date_Entree',60);
            $table->date('Date_Sortie',60)->nullable(true);
            $table->string('Statut',60)->nullable(true);
            $table->string('CNSS',60);
            $table->string('salaireFixe',60);
            $table->string('Adresse',60);
            $table->string('photo',300)->nullable(true);
            
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
        Schema::dropIfExists('employes');
    }
};
