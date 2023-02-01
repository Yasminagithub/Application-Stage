<?php

namespace App\Models;
use App\Models\Depense;
use App\Models\Materiel;
use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $table = 'fournisseurs';

    protected $guarded=[];
    
    public function depense()
    {
       return $this->hasMany(Depense::class,'fournisseur_id','id');
    }

    public function materiel()
    {
       return $this->hasMany(Materiel::class,'fournisseur_id','id');
    }
}
