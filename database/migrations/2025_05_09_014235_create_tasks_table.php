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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users');  // Зв'язок з клієнтом
            $table->foreignId('employee_id')->nullable()->constrained('users');  // Зв'язок з працівником, може бути порожнім
            $table->string('title');  // Заголовок завдання
            $table->text('description')->nullable();  // Опис завдання
            $table->timestamps();  // Час створення та оновлення
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
