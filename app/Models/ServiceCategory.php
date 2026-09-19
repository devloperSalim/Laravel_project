<?php

namespace App\Models;

use App\Models\ServiceRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Une catégorie peut avoir plusieurs demandes de service.
     */
    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'service_category_id');
    }
}
