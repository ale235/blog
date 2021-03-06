<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    /*
     * 
     */

    protected $table = 'posts';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'descripcion', 'summary', 'content', 'published', 'seen', 'image', 'user_id', 'image_path', 'created_at', 'updated_at'
    ];

}
