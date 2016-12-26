<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
    
    /*
     * 
     */
    protected $table = 'tag';
    protected $primaryKey = 'tag_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag_name'
    ];
    
    
}
