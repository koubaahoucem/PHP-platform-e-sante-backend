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
        Schema::create('ordonnnaces', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->date('dateOrdonnance')->unique();
            $table->string('detailsOrdonnance')->unique();
            $table->unsignedBigInteger("phamacienID")
                ->foreign("phamacienID")
                ->references("id")
                ->onDelete("restrict"); // todo cascade or restrict ?
            $table->unsignedBigInteger("patientID")
                ->foreign("patientID")
                ->references("id")
                ->onDelete("restrict"); // todo cascade or restrict ?
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordonnnaces');
    }
};
