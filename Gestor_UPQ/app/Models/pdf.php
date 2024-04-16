<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    protected $table = 'pdfs';
    protected $fillable = [
        'categoria', 'subcategoria', 'cuatri', 'fuente_interna', 'nombre_archivo',
    ];
}
