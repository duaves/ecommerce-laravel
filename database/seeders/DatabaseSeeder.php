<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->command->info('Данные для категории');

        $this->call(BrandTableSeeder::class);
        $this->command->info('Данные для брендов');

        $this->call(ProductTableSeeder::class);
        $this->command->info('Данные для товаров');

        $this->call(UserSeeder::class);
        $this->command->info('Данные для пользователей');
    }
}
