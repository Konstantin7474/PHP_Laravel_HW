<?php

namespace App\Http\Middleware;

use Closure;
/* use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response; */
use Illuminate\Support\Facades\File;
use App\Models\Log_2;

class DataLogger
{
    private $start_time;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        /* dd('Middleware handle executed'); */
        $this->start_time = microtime(true);
        return $next($request);
    }


    public function terminate($request, $response)
    /* {
        dd('Midleware terminate execute!');
    } */

    {
        if (env('API_DATALOGGER', true)) {
            if (env('API_DATALOGGER_USE_DB', true)) {
                $endTime = microtime(true);
                $log = new Log_2();
                $log->time = gmdate('Y-m-d M:i:s');
                $log->duration = number_format($endTime - LARAVEL_START, 3);
                $log->ip = $request->ip();
                $log->url = $request->fullUrl();
                $log->method = $request->method();
                $log->input = $request->getContent();

                dd($log);
                
                $log->save();
            } else {
                $endTime = microtime(true);
                $file_name = 'api_datalogger_' . date('d-m-y') . '.log';
                $dataToLog = 'Time: ' . gmdate("F j, Y, g:i m") . "\n";
                $dataToLog .= 'Duration: ' . number_format($endTime - LARAVEL_START, 3) . "\n";
                $dataToLog .= 'IP Address: ' . $request->ip() . "\n";
                $dataToLog .= 'URL: '  . $request->fullUrl() . "\n";
                $dataToLog .= 'Method: ' . $request->method() . "\n";
                $dataToLog .= 'Input: ' . $request->getContent() . "\n";
                File::append(storage_path('logs' . DIRECTORY_SEPARATOR . $file_name), $dataToLog . "\n" . str_repeat("-", 20) . "\n");
            }
        }
    }
}
