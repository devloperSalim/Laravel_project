<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    public function run(): void
    {
        ServiceCategory::create([
            'name' => 'Plomberie',
            'description' => 'Réparation des fuites, robinets et canalisations.',
            'is_active' => true,
        ]);

        ServiceCategory::create([
            'name' => 'Électricité',
            'description' => 'Installation et réparation des équipements électriques.',
            'is_active' => true,
        ]);

        ServiceCategory::create([
            'name' => 'Chauffage',
            'description' => 'Installation et maintenance des systèmes de chauffage.',
            'is_active' => true,
        ]);

        ServiceCategory::create([
            'name' => 'Climatisation',
            'description' => 'Installation et maintenance des climatiseurs.',
            'is_active' => true,
        ]);

        ServiceCategory::create([
            'name' => 'Maintenance informatique',
            'description' => 'Dépannage et maintenance des équipements informatiques.',
            'is_active' => true,
        ]);
    }
}
