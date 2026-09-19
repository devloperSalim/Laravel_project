<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'intervention_id',
        'diagnosis',
        'work_performed',
        'parts_used',
        'recommendations',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Le rapport appartient à une intervention.
     */
    public function intervention()
    {
        return $this->belongsTo(
            Intervention::class,
            'intervention_id'
        );
    }
}
