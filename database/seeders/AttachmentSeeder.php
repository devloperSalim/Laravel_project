<?php

namespace Database\Seeders;

use App\Models\Attachment;
use Illuminate\Database\Seeder;

class AttachmentSeeder extends Seeder
{
    public function run(): void
    {
        Attachment::create([
            'service_request_id' => 1,
            'uploaded_by' => 5,
            'file_name' => 'fuite-cuisine.jpg',
            'file_path' => 'attachments/fuite-cuisine.jpg',
            'file_type' => 'image/jpeg',
            'file_size' => 245000,
        ]);

        Attachment::create([
            'service_request_id' => 2,
            'uploaded_by' => 6,
            'file_name' => 'prise-electrique.jpg',
            'file_path' => 'attachments/prise-electrique.jpg',
            'file_type' => 'image/jpeg',
            'file_size' => 198000,
        ]);
    }
}
