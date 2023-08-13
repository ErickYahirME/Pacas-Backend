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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('calle');
            $table->integer('numExt');
            $table->integer('numInt');
            $table->string('colonia');
            $table->string('municipio');
            $table->string('estado');
            $table->string('pais');
            $table->integer('codigoPostal');
            $table->string('nombreCompleto');

            $table->unsignedBigInteger('idUser')->nullable();

            $table->foreign('idUser')
            ->references('id')->on('users')->onDelete('set null');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
