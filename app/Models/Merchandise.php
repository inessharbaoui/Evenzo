<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Merchandise extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'merchandise';
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'photo_path',
    ];
}
