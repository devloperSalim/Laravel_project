<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;

    protected $fillable = [
        'assignment_id',
        'started_at',
        'completed_at',
        'status',
        'technician_notes',
    ];

    protected function casts(): array
    {
        return [
            'started_at' => 'datetime',
            'completed_at' => 'datetime',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * L'intervention appartient à une affectation.
     */
    public function assignment()
    {
        return $this->belongsTo(
            Assignment::class,
            'assignment_id'
        );
    }

    /**
     * Une intervention possède un rapport de service.
     */
    public function serviceReport()
    {
        return $this->hasOne(
            ServiceReport::class,
            'intervention_id'
        );
    }
}
