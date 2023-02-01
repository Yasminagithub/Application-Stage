<?php

namespace App\Models;
use App\Models\Frais;
use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;


class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiants';

    protected $guarded=[];
   public function frais()
   {
      return $this->hasMany(Frais::class,'etudiant_id','id');
   }
}
