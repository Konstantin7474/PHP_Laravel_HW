<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class News extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    /* protected static function boot()
    {
        parent::boot();

        static::updating(function (News $news) {
            Log::info('Updating news ' . $news);
        });
    } */
}
