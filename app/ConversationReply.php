<?php
/**
 * Copyright (c) 2020.
 * [Alvaro Lucas Castillo Calabacero]
 * Contact alvarolucascc96@gmail.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConversationReply extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reply','user_id_fk', 'ip', 'time','conversation_id_fk','latitude','longitude',
    ];

    protected $guarded = [];
}
