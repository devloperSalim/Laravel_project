<?php

namespace Database\Seeders;

use App\Models\Assignment;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    public function run(): void
    {
        Assignment::create([
            'service_request_id' => 1,
            'technician_id' => 3,
            'assigned_by' => 2,
            'assigned_at' => now(),
            'notes' => 'Intervention pour fuite d’eau dans la cuisine.',
        ]);

        Assignment::create([
            'service_request_id' => 2,
            'technician_id' => 4,
            'assigned_by' => 2,
            'assigned_at' => now(),
            'notes' => 'Vérification des prises électriques.',
        ]);
    }
}
