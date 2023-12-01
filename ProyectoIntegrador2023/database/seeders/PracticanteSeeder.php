<?php

namespace Database\Seeders;

use App\Models\Practicante;

use Illuminate\Database\Seeder;

class PracticanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Practicante::factory(10)->create();

    }
}
