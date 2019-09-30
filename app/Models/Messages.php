<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'messages';

    public function user()
    {
        return $this->belongsTo('App\Models\Users','user_id','id');
    }
}
