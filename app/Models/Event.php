<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Event extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'events';

    protected $fillable = ['name', 'artist', 'location', 'duration', 'type', 'max_attendees', 'price', 'photo_path'];

}
