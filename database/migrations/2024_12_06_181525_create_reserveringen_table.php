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
        Schema::create('reserveringen', function (Blueprint $table) {
            $table->id('reservering_id');
            $table->foreignId('huis')->constrained('huizen', 'huis_id');
            $table->foreignId('user')->constrained('users');
            $table->date('start_datum');
            $table->date('eind_datum');
            $table->integer('aantal_personen');
            $table->boolean('betaald')->default(false);
            $table->date('betaal_datum')->nullable();
            $table->decimal('totaal_prijs', 8, 2);
            $table->text('opmerkingen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserveringen');
    }
};
