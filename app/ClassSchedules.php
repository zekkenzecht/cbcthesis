<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSchedules extends Model
{
	protected $table = 'classschedules';
	protected $fillable = ['class_id', 'schedule'];
    public function schedule(){
    	return $this->hasMany('App\Classes');
    }
}
