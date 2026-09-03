<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mission extends Model
{
    protected $primaryKey = 'id_mission';

    protected $fillable = [
        'id_client',
        'id_specialite',
        'titre',
        'description',
        'budget',
        'ville',
        'date_debut',
        'date_fin',
        'nombre_poste',
        'niveau_experience',
        'statut',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'budget' => 'decimal:2',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(
            Client::class,
            'id_client',
            'id_client'
        );
    }

    public function specialite(): BelongsTo
    {
        return $this->belongsTo(
            Specialite::class,
            'id_specialite',
            'id_specialite'
        );
    }
}