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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('nombre')->unique();
            $table->string('categoria')->nullable();
            $table->unsignedBigInteger('cantidad')->default(0);
            $table->unsignedBigInteger('precio')->default(0);
            $table->unsignedBigInteger('antiguo')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
