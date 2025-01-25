<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log_2 extends Model
{
    //
    protected $fillable = ['time', 'duration', 'ip', 'url', 'method', 'input'];
    public $timestamps = false;
}
