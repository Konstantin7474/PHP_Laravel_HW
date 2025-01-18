<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_2 extends Model
{
    /** @use HasFactory<\Database\Factories\User2Factory> */
    use HasFactory;
    protected $fillable = ['name', 'surname', 'email'];
}
