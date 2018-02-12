<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fellowship extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
