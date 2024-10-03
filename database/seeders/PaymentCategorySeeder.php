<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\PaymentCategory::factory()->create([
            'payment_category' => 'Biaya BLK',
            'payment_category_status' => '1',
        ]);
        \App\Models\PaymentCategory::factory()->create([
            'payment_category' => 'Biaya Pendaftaran',
            'payment_category_status' => '1',
        ]);
        \App\Models\PaymentCategory::factory()->create([
            'payment_category' => 'Biaya MCU Pra',
            'payment_category_status' => '1',
        ]);
        \App\Models\PaymentCategory::factory()->create([
            'payment_category' => 'Marketing',
            'payment_category_status' => '1',
        ]);
        \App\Models\PaymentCategory::factory()->create([
            'payment_category' => 'Biaya Job',
            'payment_category_status' => '1',
        ]);
        \App\Models\PaymentCategory::factory()->create([
            'payment_category' => 'Biaya id',
            'payment_category_status' => '1',
        ]);
        \App\Models\PaymentCategory::factory()->create([
            'payment_category' => 'Pasporan',
            'payment_category_status' => '1',
        ]);
        \App\Models\PaymentCategory::factory()->create([
            'payment_category' => 'Medical Full',
            'payment_category_status' => '1',
        ]);
        \App\Models\PaymentCategory::factory()->create([
            'payment_category' => 'Biaya Leges',
            'payment_category_status' => '1',
        ]);
        \App\Models\PaymentCategory::factory()->create([
            'payment_category' => 'Biaya TETO',
            'payment_category_status' => '1',
        ]);
        \App\Models\PaymentCategory::factory()->create([
            'payment_category' => 'Biaya PAP',
            'payment_category_status' => '1',
        ]);
        \App\Models\PaymentCategory::factory()->create([
            'payment_category' => 'Biaya Penerbangan',
            'payment_category_status' => '1',
        ]);
    }
}
