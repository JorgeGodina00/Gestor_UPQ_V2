<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    //use HasFactory;
    protected $table='documentos_tutoria';
    protected $primaryKey = 'id_doc';

    public $timestamps = false;

    protected $fillable=[
        'usuario',
        'rol',
        'correo',
        'nombre_documento',
        'documento',
    ];

}
