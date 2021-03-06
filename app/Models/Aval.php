<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aval extends Model
{
    protected $table = 'avales';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_path', 'texto_uno', 'orden', 'estado'
    ];

    public $timestamps = true;

}
