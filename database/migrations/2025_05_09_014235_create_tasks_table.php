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

            // Користувач, який створив завдання (клієнт)
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');

            // Працівник, якому призначено завдання
            $table->foreignId('employee_id')->nullable()->constrained('users')->onDelete('set null');

            // Назва і опис завдання
            $table->string('title');
            $table->text('description')->nullable();

            // Термін виконання (який задає клієнт)
            $table->date('deadline')->nullable();

            // Вартість, яку встановлює адміністратор
            $table->decimal('price', 10, 2)->nullable();

            // Статус завдання: pending, approved, rejected
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            $table->timestamps();
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
