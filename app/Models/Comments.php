<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    /*
 *
 */

    protected $table = 'comments';
    protected $primaryKey = 'comments_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'seen', 'created_at', 'upload_at', 'post_id', 'users_id'
    ];
}
