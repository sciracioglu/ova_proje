<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ARGBRDMAIL extends Model
{
    protected $table      = 'ARGBRDMAIL';
    protected $connection = 'personel';
    protected $guarded    = [];
    protected $timestamps = false;
}