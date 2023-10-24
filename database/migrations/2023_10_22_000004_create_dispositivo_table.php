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
        Schema::create('dispositivo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',255);
            $table->unsignedBigInteger('id_bodega');
            $table->unsignedBigInteger('id_modelo');
            $table->foreign('id_bodega')->references('id')->on('bodega');
            $table->foreign('id_modelo')->references('id')->on('modelo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivo');
    }
};
