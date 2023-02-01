<?php

namespace App\Models;
use App\Models\Depense;
use App\Models\Fournisseur;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;
    protected $table = 'depenses';

    protected $fillable = [
        'fournisseur_id',
        'categorie',
        'SousCategorie',
        'Date_Depense',
        'Heure_Depense',
        'Montant_Depense',
        'Description',
        'name',
        'path',
    ];

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id', 'id');
    }

}
