<?php

namespace App\Models;

use App\Models\Renumeration;
use App\Models\Employe;
use App\Models\Transport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $table = 'employes';
    protected $guarded=[];

    public function renumeration()
    {
        return $this->hasMany(Renumeration::class,'employe_id','id');
    }

    public function transport()
    {
        return $this->hasMany(Transport::class,'employe_id','id');
    }
}
