<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

   public function classschedules(){
   	return $this->belongsTo('App\ClassSchedules');
   }

   public function user(){
   	return $this->belongsTo('App\User');
   }
}
