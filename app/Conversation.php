<?php
/**
 * Copyright (c) 2020.
 * [Alvaro Lucas Castillo Calabacero]
 * Contact alvarolucascc96@gmail.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

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

    public function userOne() {
        return $this->hasOne('App\User','id','user_one_fk');
    }

    public function userTwo() {
        return $this->hasOne('App\User','id','user_two_fk');
    }
}
