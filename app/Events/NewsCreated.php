<?php

namespace App\Events;
use App\Models\News;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class NewsCreated
{
    use Dispatchable, SerializesModels;

    public News $news;

    
    public function __construct(News $news)
    {
        
        $this->news = $news;
        Log::info('News created event fired');
    }
    

}
