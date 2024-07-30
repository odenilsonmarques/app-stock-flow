<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Deliverymen;

class DeliverymenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Aqui estamos criando 10 registros fictícios na tabela deliverymens
        Deliverymen::factory()->count(10)->create();
    }
}
