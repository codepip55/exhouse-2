<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('huizen', function (Blueprint $table) {
            $table->id('huis_id');
            $table->string('naam');
            $table->string('plaats');
            $table->string('straatnaam');
            $table->string('huisnummer');
            $table->string('toevoeging')->nullable();
            $table->string('postcode');
            $table->text('omschrijving')->nullable();
            $table->decimal('prijs_per_week', 8, 2);
            $table->integer('aantal_personen');
            $table->integer('totaal_aantal_kamers');
            $table->integer('aantal_slaapkamers');
            $table->integer('aantal_badkamers');
            $table->integer('aantal_toiletten');
            $table->integer('aantal_verdiepingen');
            $table->text('voorzieningen')->nullable();
            $table->boolean('beschikbaar');
            $table->boolean('heeft_tuin');
            $table->boolean('heeft_balkon');
            $table->boolean('heeft_garage');
            $table->integer('garage_capaciteit')->nullable();
            $table->json('fotos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('huizen');
    }
};
