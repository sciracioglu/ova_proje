<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ARGBYNBS extends Model
{
    protected $table      = 'ARGBYNBS';
    public $timestamps    = false;
    protected $fillable   = [
        'GONDERILDI'
    ];

    public static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            $model->ISLEMTARIHI = date('Y-m-d H:i:s');
        });
    }
}
