<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Створення адміністратора
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // рекомендується змінити на більш безпечний пароль
            'role' => 'admin',
        ]);

        // Створення кількох звичайних користувачів
        User::factory(5)->create();
    }
}
