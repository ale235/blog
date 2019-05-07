<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {
    /*
     * 
     */

    protected $table = 'message';
    protected $primaryKey = 'message_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_name', 'from_phone', 'from_email', 'subject', 'message_text'
    ];

}
