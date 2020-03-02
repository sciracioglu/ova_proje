<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ARGMSJ extends Model
{
    protected $table      = 'ARGMSJ';
    public $timestamps    = false;
    protected $fillable   = [
        'GUID',
        'MESAJ'
    ];

    public static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            $model->ISLEMTARIHI = date('Y-m-d H:i:s');
        });
    }
}
