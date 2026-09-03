<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Freelance extends Model
{
    protected $primaryKey = 'id_freelance';

    public $incrementing = false;

    protected $fillable = [
        'id_freelance',
        'telephone',
        'adresse',
        'ville',
        'description',
        'cv',
        'id_specialite',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_freelance', 'id');
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