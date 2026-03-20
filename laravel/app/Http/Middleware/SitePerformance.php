<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class SitePerformance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $start = microtime(true);

        $response = $next($request);

        $duration = (microtime(true) - $start) * 1000;

        DB::table('performance_metrics')->insert([
            'user_id' => auth()->id(),
            'route' => $request->path(),
            'method' => $request->method(),
            'status_code' => $response->getStatusCode(),
            'response_time_ms' => (int) $duration,
            'error_occurred' => $response->getStatusCode() >= 400,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $response;
    }
}
