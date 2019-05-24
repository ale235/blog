<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    protected $table = 'miembros';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_path', 'nombre', 'slug','texto_uno','texto_dos', 'orden', 'estado','instagram', 'facebook', 'twitter'
    ];

    public $timestamps = true;

}
