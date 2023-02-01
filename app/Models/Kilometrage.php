<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kilometrage extends Model
{
    use HasFactory;
    protected $table = 'kilometrages';

    protected $fillable = [
        'transport_id',
        'Kilometrage',
        'Date_Kilometrage',
        'Heure_Kilo',
        'Commentaire_Kilometrage',
    ];

    public function transport()
    {
        return $this->belongsTo(Transport::class, 'transport_id', 'id');
    }
}
