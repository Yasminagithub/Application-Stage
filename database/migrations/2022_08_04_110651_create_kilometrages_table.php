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
        Schema::create('kilometrages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transport_id')->constrained('transports')->cascadeOnDelete();
            $table->string('Kilometrage',60);
            $table->date('Date_Kilometrage');
            $table->string('Heure_Kilo',20);
            $table->text('Commentaire_Kilometrage');
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
        Schema::dropIfExists('kilometrages');
    }
};
