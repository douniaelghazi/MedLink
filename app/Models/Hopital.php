<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hopital extends Model
{
    protected $table = 'hopitals';

    protected $primaryKey = 'id_hopital';

    public $incrementing = false;

    protected $fillable = [
        'id_hopital',
        'nom',
        'type',
        'adresse',
        'description',
        'logo',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'id_hopital',
            'id'
        );
    }

    public function missions(): HasMany
    {
        return $this->hasMany(
            Mission::class,
            'id_hopital',
            'id_hopital'
        );
    }
}