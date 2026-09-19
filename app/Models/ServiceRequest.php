<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'service_category_id',
        'title',
        'description',
        'address',
        'city',
        'priority',
        'status',
        'preferred_date',
    ];

    protected function casts(): array
    {
        return [
            'preferred_date' => 'datetime',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * La demande appartient à un client.
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    /**
     * La demande appartient à une catégorie de service.
     */
    public function serviceCategory()
    {
        return $this->belongsTo(
            ServiceCategory::class,
            'service_category_id'
        );
    }

    /**
     * Une demande peut avoir plusieurs affectations.
     */
    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'service_request_id');
    }

    /**
     * Une demande peut avoir plusieurs factures.
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'service_request_id');
    }

    /**
     * Une demande peut avoir plusieurs pièces jointes.
     */
    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'service_request_id');
    }
}
