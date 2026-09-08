<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mission extends Model
{
    protected $table = 'missions';

    protected $primaryKey = 'id_mission';

    protected $fillable = [
        'id_hopital',
        'titre',
        'description',
        'specialite_recherchee',
        'budget',
        'ville',
        'date_debut',
        'date_fin',
        'nombre_de_postes',
        'niveau_d_experience',
        'statut',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'budget' => 'decimal:2',
    ];

    public function hopital(): BelongsTo
    {
        return $this->belongsTo(
            Hopital::class,
            'id_hopital',
            'id_hopital'
        );
    }

    public function candidatures(): HasMany
    {
        return $this->hasMany(
            Candidature::class,
            'id_mission',
            'id_mission'
        );
    }
}