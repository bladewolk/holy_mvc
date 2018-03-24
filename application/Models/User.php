<?php

namespace application\models;

//use application\Core\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'login',
        'pass'
    ];
//    protected $table = 'users';

    protected $hidden = [
        'pass'
    ];

    protected $guarded = [
        'pass'
    ];
}