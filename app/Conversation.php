<?php
/**
 * Copyright (c) 2020.
 * [Alvaro Lucas Castillo Calabacero]
 * Contact alvarolucascc96@gmail.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_one','user_two', 'ip', 'time',

    ];

    protected $guarded = [];
}
