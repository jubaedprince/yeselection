<?php

namespace App\Http\Middleware;

use Closure;
use App\Key;
class CheckValidKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $key = Key::where('key', $request->input('key'))->first();

        if ($key==null)
        {
            return "You can't vote!";
        }

        if($key->voted)
        {
            return "You already voted";
        }

        return $next($request);
    }
}
