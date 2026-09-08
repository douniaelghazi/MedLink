<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medecin extends Model
{
    protected $table = 'medecins';

    protected $primaryKey = 'id_medecin';

    public $incrementing = false;

    protected $fillable = [
        'id_medecin',
        'Photo_de_profil',
        'nom_complet',
        'email',
        'telephone',
        'ville',
        'experience',
        'diplome',
        'CV',
        'disponibilite',
        'description_professionnelle',
        'id_specialite',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'id_medecin',
            'id'
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

    public function candidatures(): HasMany
    {
        return $this->hasMany(
            Candidature::class,
            'id_medecin',
            'id_medecin'
        );
    }
}