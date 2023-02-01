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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('CNE',60)->unique();
            $table->string('Genre',10);
            $table->string('Telephone_Parent',60);
            $table->string('Cycle',60);
            $table->string('Niveau',60);
            $table->string('Groupe',60);
            $table->string('Statut',60)->nullable(true);
            $table->string('Nouvelle_Ecole',60)->nullable(true);
            $table->string('TypePaiement',60);
            $table->string('Transport',60);
            $table->string('Nom_Etudiant',60);
            $table->string('Prenom_Etudiant',60);
            $table->date('Date_Naissance_Etudiant',60);
            $table->string('Nunero_Telephone_Etudiant',60);
            $table->string('Email_Etudiant',60)->nullable(true);
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
        Schema::dropIfExists('etudiants');
    }
};
