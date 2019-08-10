<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    protected $fillable = [
        'title',
        'description',
        'rating',
        'user_id',
        'mountain_id'
    ];


}
