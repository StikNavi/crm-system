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
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Назва офісу
            $table->string('address');  // Адреса офісу
            $table->decimal('latitude', 10, 7);  // Широта
            $table->decimal('longitude', 10, 7);  // Довгота
            $table->timestamps();  // Час створення та оновлення
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offices');
    }
};
