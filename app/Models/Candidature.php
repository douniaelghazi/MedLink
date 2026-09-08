<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidature extends Model
{
    protected $table = 'candidatures';

    protected $primaryKey = 'id_candidature';

    protected $fillable = [
        'nom',
        'CV',
        'message',
        'date_candidature',
        'statut',
        'id_medecin',
        'id_mission',
    ];

    protected $casts = [
        'date_candidature' => 'date',
    ];

    public function mission(): BelongsTo
    {
        return $this->belongsTo(
            Mission::class,
            'id_mission',
            'id_mission'
        );
    }

    public function medecin(): BelongsTo
    {
        return $this->belongsTo(
            Medecin::class,
            'id_medecin',
            'id_medecin'
        );
    }
}