<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email'
    ];

    protected $hidden = [ //polja koja hocemo da sakrijemo
        'created_at'
    ];
}
