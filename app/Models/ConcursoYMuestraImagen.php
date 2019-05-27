<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConcursoYMuestraImagen extends Model
{
    protected $table = 'concursosymuestras_imagens';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'concursosymuestra_id','titulo', 'image_path', 'slug', 'orden', 'estado'
    ];

    public $timestamps = true;

}
