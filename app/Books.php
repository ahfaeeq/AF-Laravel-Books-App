<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $books = [
        'name',
        'release_date',
        'author'
    ];
}
