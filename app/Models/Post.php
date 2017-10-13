<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    /*
     * 
     */

    protected $table = 'post';
    protected $primaryKey = 'post_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'summary', 'content', 'published', 'seen', 'image', 'users_id', 'created_at', 'updated_at'
    ];

}
