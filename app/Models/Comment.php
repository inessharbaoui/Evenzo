<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Comment extends Eloquent
{
    protected $connection = 'mongodb';
    protected $fillable = ['text', 'created_at'];
}
