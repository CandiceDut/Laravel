<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    use HasApiTokens, HasFactory;
    
    protected $table = 'clients';

    protected $primaryKey = 'numeroClient';

    protected $fillable = [
        'nom',
        'prenom',
        'age',
        'adresse',
        'email',
        'carteBancaire'
    ];

    protected $casts = [
        'nom' => 'string',
        'prenom' => 'string',
        'age' => 'integer',
        'adresse' => 'string',
        'email' => 'string',
        'carteBancaire' => 'string'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
