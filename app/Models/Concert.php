<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Concert extends Eloquent
{
    protected $connection = 'mongodb';

    protected $collection = 'concerts';

    protected $fillable = [
        'name',
        'artist',
        'date',
        'pictures',
    ];

    protected $casts = [

        'pictures' => 'array',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
