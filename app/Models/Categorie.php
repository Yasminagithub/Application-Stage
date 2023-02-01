<?php

namespace App\Models;
use App\Models\Categorie;
use App\Models\Flight;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $guarded=[];

    public function flight()
    {
       return $this->hasMany(Flight::class,'categorie_id','id');
    }

}
