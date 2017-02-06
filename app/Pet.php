<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pets';


    protected $fillable = [
        'pet_type',
        'price',
        'title',
        'description',
        'contact',
        'filePath',
        'user',

    ];
}

