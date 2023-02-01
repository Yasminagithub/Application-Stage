<?php

namespace App\Models;
use App\Models\Frais;
use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frais extends Model
{
    use HasFactory;
    protected $table = 'frais';

    protected $fillable = [
        'etudiant_id',
        'MontantPaiement',
        'DatePaiement',
        'DateFrom',
        'DateTo',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'etudiant_id', 'id');
    }

}
