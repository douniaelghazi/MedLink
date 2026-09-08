<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialite extends Model
{
    protected $table = 'specialites';

    protected $primaryKey = 'id_specialite';

    protected $fillable = [
        'nom',
        'description',
    ];

    public function medecins(): HasMany
    {
        return $this->hasMany(
            Medecin::class,
            'id_specialite',
            'id_specialite'
        );
    }
}