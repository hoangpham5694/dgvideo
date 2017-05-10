<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoCate extends Model
{
	protected $table = 'video_cate';
     protected $fillable = [
        'id','cate_id', 'video_id'
    ];

}
