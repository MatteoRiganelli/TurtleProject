<?php

namespace App\Model;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // protected $guarded = [];

    protected $fillable = [
        'title',
        'archive',
        'user_id',
        'completed',
        'editing'
    ];

}
