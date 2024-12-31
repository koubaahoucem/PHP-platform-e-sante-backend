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
        Schema::create('medicament_ordonnance', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('medicament_id')->foreign('medicament_id')->references('id')->on('medicaments')->onDelete('cascade');
            $table->unsignedInteger('ordonnance_id')->foreign('ordonnance_id')->references('id')->on('ordonnances')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['medicament_id', 'ordonnance_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicament_ordonnance');
    }
};
