<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = ['title','resume', 'text', 'link', 'image', 'author'];
}
