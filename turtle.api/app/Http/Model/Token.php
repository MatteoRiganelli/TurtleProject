<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    // disabled Eloquent 'created_at' and 'updated_at' columns
    public $timestamps = false;

     protected $fillable = ['user_id', 'token', 'expired_at'];


}
