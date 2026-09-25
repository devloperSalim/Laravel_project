<?php

namespace Tests\Feature;

use App\Models\Assignment;
use App\Models\Attachment;
use App\Models\Intervention;
use App\Models\Invoice;
use App\Models\ServiceCategory;
use App\Models\ServiceReport;
use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ServiceRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_service_request_relations_are_working(): void
    {
        // Users
        $client = User::create([
            'name' => 'Test Client',
            'email' => 'client@test.com',
            'password' => Hash::make('password'),
            'role' => 'client',
        ]);

        $technician = User::create([
            'name' => 'Test Technician',
            'email' => 'technician@test.com',
            'password' => Hash::make('password'),
            'role' => 'technician',
            'specialty' => 'plomberie',
        ]);

        $manager = User::create([
            'name' => 'Test Manager',
            'email' => 'manager@test.com',
            'password' => Hash::make('password'),
            'role' => 'manager',
        ]);

        // Service Category
        $category = ServiceCategory::create([
            'name' => 'Plomberie',
            'description' => 'Test category',
            'is_active' => true,
        ]);

        // Service Request
        $request = ServiceRequest::create([
            'client_id' => $client->id,
            'service_category_id' => $category->id,
            'title' => 'Test Service Request',
            'description' => 'Test description',
            'address' => 'Hay Essalam',
            'city' => 'El Jadida',
            'priority' => 'high',
            'status' => 'pending',
            'preferred_date' => now()->addDay(),
        ]);

        // Assignment
        $assignment = Assignment::create([
            'service_request_id' => $request->id,
            'technician_id' => $technician->id,
            'assigned_by' => $manager->id,
            'assigned_at' => now(),
            'notes' => 'Test assignment',
        ]);

        // Intervention
        $intervention = Intervention::create([
            'assignment_id' => $assignment->id,
            'started_at' => now(),
            'status' => 'in_progress',
            'technician_notes' => 'Test intervention',
        ]);

        // Service Report
        $report = ServiceReport::create([
            'intervention_id' => $intervention->id,
            'diagnosis' => 'Test diagnosis',
            'work_performed' => 'Test work performed',
            'parts_used' => 'Test parts',
            'recommendations' => 'Test recommendations',
        ]);

        // Invoice
        $invoice = Invoice::create([
            'service_request_id' => $request->id,
            'invoice_number' => 'TEST-INV-001',
            'subtotal' => 500,
            'tax' => 100,
            'total' => 600,
            'status' => 'sent',
            'issued_at' => now()->toDateString(),
            'due_at' => now()->addDays(15)->toDateString(),
        ]);

        // Attachment
        $attachment = Attachment::create([
            'service_request_id' => $request->id,
            'uploaded_by' => $client->id,
            'file_name' => 'test.jpg',
            'file_path' => 'attachments/test.jpg',
            'file_type' => 'image/jpeg',
            'file_size' => 100000,
        ]);

        // Reload with all relationships
        $request->load([
            'client',
            'serviceCategory',
            'assignments.technician',
            'assignments.intervention.serviceReport',
            'invoices',
            'attachments.uploadedBy',
        ]);

        // Assertions
        $this->assertNotNull($request);

        $this->assertNotNull($request->client);
        $this->assertEquals('Test Client', $request->client->name);

        $this->assertNotNull($request->serviceCategory);
        $this->assertEquals('Plomberie', $request->serviceCategory->name);

        $this->assertNotEmpty($request->assignments);

        $this->assertNotNull(
            $request->assignments->first()->technician
        );

        $this->assertEquals(
            'Test Technician',
            $request->assignments->first()->technician->name
        );

        $this->assertNotNull(
            $request->assignments->first()->intervention
        );

        $this->assertEquals(
            'in_progress',
            $request->assignments->first()->intervention->status
        );

        $this->assertNotNull(
            $request->assignments->first()->intervention->serviceReport
        );

        $this->assertEquals(
            'Test diagnosis',
            $request->assignments->first()->intervention->serviceReport->diagnosis
        );

        $this->assertNotEmpty($request->invoices);
        $this->assertEquals(
            'TEST-INV-001',
            $request->invoices->first()->invoice_number
        );

        $this->assertNotEmpty($request->attachments);
        $this->assertEquals(
            'test.jpg',
            $request->attachments->first()->file_name
        );
    }
}
