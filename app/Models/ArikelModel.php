<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ArikelModel extends Model
{
    use HasFactory,HasTranslations;

    protected  $table = 'tb_artikel';
    protected $fillable = [
        'id' , 'description'
    ];

    public $translatable = [
        'description'
    ];
}
