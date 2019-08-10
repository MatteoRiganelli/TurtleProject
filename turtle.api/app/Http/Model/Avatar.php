<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $table = 'avatar';

    // enable/disabled Eloquent 'created_at' and 'updated_at' columns
    public $timestamps = true;

     protected $fillable = ['user_id', 'image_path'];


}
