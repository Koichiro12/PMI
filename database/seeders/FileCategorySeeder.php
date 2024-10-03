<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\FileCategory::factory()->create([
            'category_files' => 'KTP',
            'category_status' => '1',
        ]);
        \App\Models\FileCategory::factory()->create([
            'category_files' => 'KK',
            'category_status' => '1',
        ]);
        \App\Models\FileCategory::factory()->create([
            'category_files' => 'Akte Kelahiran',
            'category_status' => '1',
        ]);
        \App\Models\FileCategory::factory()->create([
            'category_files' => 'Buku Nikah / Akte Cerai',
            'category_status' => '1',
        ]);
        \App\Models\FileCategory::factory()->create([
            'category_files' => 'PK',
            'category_status' => '1',
        ]);
        \App\Models\FileCategory::factory()->create([
            'category_files' => 'Paspor',
            'category_status' => '1',
        ]);
        \App\Models\FileCategory::factory()->create([
            'category_files' => 'Visa',
            'category_status' => '1',
        ]);
    }
}
