<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News2 extends Model
{
    //
    use HasFactory;
    
    protected $table = 'news_table2';

    protected $fillable = [
        'title', 'body'
    ];
}
