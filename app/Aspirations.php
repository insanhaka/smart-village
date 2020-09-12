<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspirations extends Model
{
    protected $fillable = [
        'nama', 'img_aspirasi', 'isi',
    ];
}
