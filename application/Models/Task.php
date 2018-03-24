<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.03.2018
 * Time: 20:49
 */

namespace application\models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'email',
        'image',
        'text',
        'done'
    ];

    protected $casts = [
        'done' => 'bit'
    ];
}