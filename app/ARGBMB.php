<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ARGBMB extends Model
{
    protected $table      = 'ARGBMB';
    public $timestamps    = false;

    protected $fillable   = [
        'GONDERILDI',
        'ISLEM',
        'ISLEMTARIH'
    ];

    public static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            $model->ISLEMTARIH = date('d/m/Y H:i:s');
        });
    }
}
