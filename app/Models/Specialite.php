<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialite extends Model
{
    protected $primaryKey = 'id_specialite';

    protected $fillable = [
        'nom',
        'description',
    ];

    public function freelances(): HasMany
    {
        return $this->hasMany(Freelance::class, 'id_specialite');
    }

    public function missions(): HasMany
{
    return $this->hasMany(
        Mission::class,
        'id_specialite',
        'id_specialite'
    );
}
}