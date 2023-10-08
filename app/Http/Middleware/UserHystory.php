<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserHystory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $history = session('user_history', []);

        // bool <> in_array($request->url(), $history);

        if (
          empty($history[0])
          ||
          $request->url() !== $history[count($history) - 1]
        ) {
          array_push($history, [
            'url' => $request->url(),
            'time' => date('Y-m-d H:i:s'),
          ]);

          session(['user_history' => $history]);
        }

        // echo "<pre>";
        // print_r(session('user_history', []));
        // echo "<pre>";

        return $next($request);
    }
}
