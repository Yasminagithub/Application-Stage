<?php

namespace App\Models;
use App\Models\Fournisseur;
use App\Models\Materiel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;
    protected $table = 'materiels';

    protected $fillable = [
        'fournisseur_id',
        'Marque',
        'Date_Achat',
    ];

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id', 'id');
    }
}
