<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StandsYArtista extends Model
{
    protected $table = 'standsyartistas';
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
