<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $table = 'department';

    protected $fillable = [
        'department_code'
        , 'department_name'
        , 'department_description'
    ];

}
