<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_reports', function (Blueprint $table) {
            $table->id();

            $table->foreignId('intervention_id')
                ->unique()
                ->constrained('interventions')
                ->cascadeOnDelete();

            $table->text('diagnosis')->nullable();
            $table->text('work_performed');
            $table->text('parts_used')->nullable();
            $table->text('recommendations')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_reports');
    }
};
