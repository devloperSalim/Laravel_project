<?php

namespace App\Models;

use App\Models\ServiceRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_request_id',
        'technician_id',
        'assigned_by',
        'assigned_at',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'assigned_at' => 'datetime',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * L'affectation appartient à une demande de service.
     */
    public function serviceRequest()
    {
        return $this->belongsTo(
            ServiceRequest::class,
            'service_request_id'
        );
    }

    /**
     * L'affectation appartient à un technicien.
     */
    public function technician()
    {
        return $this->belongsTo(
            User::class,
            'technician_id'
        );
    }

    /**
     * L'utilisateur qui a créé l'affectation.
     */
    public function assignedBy()
    {
        return $this->belongsTo(
            User::class,
            'assigned_by'
        );
    }

    /**
     * Une affectation peut avoir une intervention.
     */
    public function intervention()
    {
        return $this->hasOne(
            Intervention::class,
            'assignment_id'
        );
    }
}
