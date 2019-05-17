<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class content extends Model
{

    protected $primaryKey = 'content_id';
    protected $fillable = [
        'title','body','department_id','user_id'
    ];


}
