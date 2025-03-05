<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Directorio extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $table = 'directorio'; 

    protected $fillable = [
        'nombre',
        'imagen',
        'catedra',
        'correo',
        'telefono',
    ];
}
