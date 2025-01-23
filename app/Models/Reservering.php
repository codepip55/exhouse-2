<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Reservering extends Model
{
    /** @use HasFactory<\Database\Factories\ReserveringFactory> */
    use HasFactory;
    protected $table = 'reserveringen';
    protected $primaryKey = 'reservering_id';
    protected $fillable = [
        'start_datum',
        'eind_datum',
        'aantal_personen',
        'totaal_prijs',
        'betaald',
        'betaal_datum',
        'opmerkingen'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function huis()
    {
        return $this->belongsTo(Huizen::class, 'huis_id', 'huis_id');
    }
}
