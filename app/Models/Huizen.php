<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huizen extends Model
{
    /** @use HasFactory<\Database\Factories\HuizenFactory> */
    use HasFactory;

    protected $table = 'huizen';
    protected $primaryKey = 'huis_id';
    protected $fillable = [
        'naam',
        'plaats',
        'straatnaam',
        'huisnummer',
        'toevoeging',
        'postcode',
        'omschrijving',
        'prijs_per_week',
        'aantal_personen',
        'totaal_aantal_kamers',
        'aantal_slaapkamers',
        'aantal_badkamers',
        'aantal_toiletten',
        'aantal_verdiepingen',
        'voorzieningen',
        'beschikbaar',
        'heeft_tuin',
        'heeft_balkon',
        'heeft_garage',
        'garage_capaciteit',
        'fotos'
    ];
}
