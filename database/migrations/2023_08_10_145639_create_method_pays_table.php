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
        Schema::create('method_pays', function (Blueprint $table) {
            $table->id();
            $table->string('numTarjeta');
            $table->integer('fechaVencimiento');
            $table->integer('cvv');
            $table->integer('price');

            $table->unsignedBigInteger('idUser')->nullable();

            $table->foreign('idUser')->references('id')->on('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('method_pays');
    }
};
