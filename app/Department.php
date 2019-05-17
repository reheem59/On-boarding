<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'department_id';
//    protected $table = 'departments';
    protected $fillable = [
        'department_name','description','image'
    ];
}
