<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        Invoice::create([
            'service_request_id' => 1,
            'invoice_number' => 'INV-2026-001',
            'subtotal' => 800.00,
            'tax' => 160.00,
            'total' => 960.00,
            'status' => 'sent',
            'issued_at' => now()->toDateString(),
            'due_at' => now()->addDays(15)->toDateString(),
            'paid_at' => null,
        ]);

        Invoice::create([
            'service_request_id' => 2,
            'invoice_number' => 'INV-2026-002',
            'subtotal' => 600.00,
            'tax' => 120.00,
            'total' => 720.00,
            'status' => 'paid',
            'issued_at' => now()->toDateString(),
            'due_at' => now()->addDays(15)->toDateString(),
            'paid_at' => now(),
        ]);
    }
}
