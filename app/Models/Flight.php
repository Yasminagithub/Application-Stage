<?php

namespace App\Models;
use App\Models\Categorie;
use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $table = 'flights';
    protected $fillable = [
        'categorie_id',
        'Nom',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id', 'id');
    }
}
