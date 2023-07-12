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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('stock');
            $table->string('description');
            $table->string('image');

            $table->unsignedBigInteger('author_id')->nullable();
            $table->unsignedBigInteger('size_id')->nullable();
            $table->unsignedBigInteger('type_clothes_id')->nullable();
            // $table->unsignedBigInteger('type_color_id')->nullable();


            $table->foreign('author_id')
            ->references('id')->on('users')
            ->onDelete('set null');

            $table->foreign('size_id')
            ->references('id')->on('sizes')
            ->onDelete('set null');

            $table->foreign('type_clothes_id')
            ->references('id')->on('type_clothes')
            ->onDelete('set null');

            $table->foreign('type_color_id')
            ->references('id')->on('type_colors')
            ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
