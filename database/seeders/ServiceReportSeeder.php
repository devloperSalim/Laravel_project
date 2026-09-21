<?php

namespace Database\Seeders;

use App\Models\ServiceReport;
use Illuminate\Database\Seeder;

class ServiceReportSeeder extends Seeder
{
    public function run(): void
    {
        ServiceReport::create([
            'intervention_id' => 1,
            'diagnosis' => 'Fuite détectée au niveau du raccord sous l’évier.',
            'work_performed' => 'Remplacement du raccord défectueux et vérification de l’installation.',
            'parts_used' => '1 raccord PVC.',
            'recommendations' => 'Vérifier régulièrement les raccordements sous l’évier.',
        ]);

        ServiceReport::create([
            'intervention_id' => 2,
            'diagnosis' => 'Problème identifié au niveau des prises électriques.',
            'work_performed' => 'Vérification du câblage et contrôle des prises.',
            'parts_used' => null,
            'recommendations' => 'Prévoir une vérification complète de l’installation électrique.',
        ]);
    }
}
