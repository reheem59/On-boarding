<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class threads_tag extends Model
{
    protected $fillable = [
        'thread_id','tag_id'
    ];
}
