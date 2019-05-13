<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriaImagen extends Model
{
    protected $table = 'galeria_imagens';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'galeria_id','titulo', 'image_path', 'slug', 'orden', 'estado'
    ];

    public $timestamps = true;
}
