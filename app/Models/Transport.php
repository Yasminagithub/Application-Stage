<?php

namespace App\Models;

use App\Models\Employe;
use App\Models\Transport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;
    protected $table = 'transports';

    protected $fillable = [
        'employe_id',
        'Immatriculation',
        'Marque',
        'Date_fin_Vignette',
        'Date_Visite_Assurance_Debut',
        'Date_Visite_Assurance_Fin',
        'Date_Visite_technique_Fin',
        'Date_Visite_equipement_Fin',
    ];

    public function kilomatrage()
    {
       return $this->hasMany(Kilometrage::class,'transport_id','id');
    }

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id', 'id');
    }

}
