<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            FileCategorySeeder::class,
            PaymentCategorySeeder::class
        ]);
        //  \App\Models\User::factory(100000)->create();

       
    }
}
