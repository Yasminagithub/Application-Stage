<?php

namespace App\Models;

use App\Models\Ecole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    use HasFactory;
    protected $table = 'ecoles';

    protected $guarded=[];
}
