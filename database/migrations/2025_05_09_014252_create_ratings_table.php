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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // Якщо клієнта видалили — видаляються оцінки

            $table->foreignId('employee_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // Якщо працівника видалили — видаляються оцінки

            $table->unsignedTinyInteger('score'); // Оцінка від 1 до 5
            $table->text('comment')->nullable(); // Коментар не обов'язковий
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
