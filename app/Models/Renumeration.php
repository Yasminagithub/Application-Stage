<?php

namespace App\Models;
use App\Models\Renumeration;
use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renumeration extends Model
{
    use HasFactory;
    protected $table = 'renumerations';

    protected $fillable = [
        'employe_id',
        'Type_renumeration',
        'Valeur_renumeration',
        'Date_renumeration',
        'Periode_renumeration',
        'DateTo',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id', 'id');
    }
}
