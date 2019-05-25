<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuienesSomo extends Model
{
    protected $table = 'quienessomos';
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
