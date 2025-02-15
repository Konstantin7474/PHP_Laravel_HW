<?php

namespace App\Observers;

use App\Models\News2;
use Illuminate\Support\Str;

class NewsObserver2
{
    //
    public function saving(News2 $news2)
    {
        $news2->slug = Str::slug($news2->title);
    }
}
