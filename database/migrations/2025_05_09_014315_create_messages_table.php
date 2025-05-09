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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('users');  // Зв'язок з користувачем-відправником
            $table->foreignId('receiver_id')->constrained('users');  // Зв'язок з користувачем-отримувачем
            $table->text('message');  // Текст повідомлення
            $table->timestamps();  // Час створення та оновлення
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
