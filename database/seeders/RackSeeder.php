<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;
use App\Models\Bay;
use App\Models\Rack;

class RackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bays = Bay::all();

        // Initialiser le compteur
        $count = 1;

        foreach ($bays as $bay) {
            for ($i = 1; $i <= 42; $i++) {

                Rack::factory()->create([
                    'bay_id' => $bay->id,
                    'rack_id' => $count,
                ]);

                $count++;

                if ($count > 42) {
                    $count = 1;
                }
            }
        }
    }
}
