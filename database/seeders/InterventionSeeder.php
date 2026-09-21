<?php

namespace Database\Seeders;

use App\Models\Intervention;
use Illuminate\Database\Seeder;

class InterventionSeeder extends Seeder
{
    public function run(): void
    {
        Intervention::create([
            'assignment_id' => 1,
            'started_at' => now(),
            'completed_at' => null,
            'status' => 'in_progress',
            'technician_notes' => 'Le technicien est arrivé sur place et commence le diagnostic.',
        ]);

        Intervention::create([
            'assignment_id' => 2,
            'started_at' => now(),
            'completed_at' => null,
            'status' => 'scheduled',
            'technician_notes' => 'Intervention planifiée pour vérifier l’installation électrique.',
        ]);
    }
}
