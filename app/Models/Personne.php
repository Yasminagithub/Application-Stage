<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;
    
    protected $table = 'personnes';

    protected $fillable = [
        'Nom_personne',
        'Prenom_personne',
        'Date_naissance_Telephone',
        'Numero_Telephone',
        'Email',
    ];
    
    public function Personne()
    {
        return $this->hasOne(Personne::class, 'personne_id', 'id');
    }
}
