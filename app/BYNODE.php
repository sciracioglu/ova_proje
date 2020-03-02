<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BYNODE extends Model
{
    protected $table      = 'BYNODE';
    public $timestamps    = false;
    protected $fillable   = [
        'ISLEM',
        'ISLEMTARIHI',
        'ACIKLAMA'
    ];
}
