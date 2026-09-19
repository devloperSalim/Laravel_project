<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_request_id',
        'uploaded_by',
        'file_name',
        'file_path',
        'file_type',
        'file_size',
    ];

    protected function casts(): array
    {
        return [
            'file_size' => 'integer',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * La pièce jointe appartient à une demande de service.
     */
    public function serviceRequest()
    {
        return $this->belongsTo(
            ServiceRequest::class,
            'service_request_id'
        );
    }

    /**
     * L'utilisateur qui a uploadé le fichier.
     */
    public function uploadedBy()
    {
        return $this->belongsTo(
            User::class,
            'uploaded_by'
        );
    }
}
