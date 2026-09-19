<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'specialty',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Les demandes de service créées par ce client.
     */
    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'client_id');
    }

    /**
     * Les affectations où cet utilisateur est le technicien.
     */
    public function assignmentsAsTechnician()
    {
        return $this->hasMany(Assignment::class, 'technician_id');
    }

    /**
     * Les affectations créées par ce manager/admin.
     */
    public function assignmentsCreated()
    {
        return $this->hasMany(Assignment::class, 'assigned_by');
    }

    /**
     * Les pièces jointes uploadées par cet utilisateur.
     */
    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'uploaded_by');
    }
}
