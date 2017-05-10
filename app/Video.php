<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	protected $table = 'videos';
    protected $fillable = [
        'title','slug', 'description', 'view','share','created_by','created_at','url','duration'
    ];

}
