<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
      protected $fillable = array('path');
      protected $table = 'medias';
}
