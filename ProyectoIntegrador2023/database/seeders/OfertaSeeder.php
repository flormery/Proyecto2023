<?php

namespace Database\Seeders;

use App\Models\Oferta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Oferta::factory(10)->create();
    }
}
