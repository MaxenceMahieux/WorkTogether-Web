<?php

namespace Database\Seeders;

use App\Models\Bay;
use Illuminate\Database\Seeder;

class BaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bay::factory()->count(30)->create();
    }
}
