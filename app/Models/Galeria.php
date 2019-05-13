<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = 'galerias';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_path', 'titulo', 'slug', 'orden', 'estado','lugar', 'resenia', 'anio'
    ];

    public $timestamps = true;

}
