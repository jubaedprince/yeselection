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
            $message="You can't vote!";
            return view('form.success')->with('message', $message);
        }

        if($key->voted)
        {
            $message="You already voted.";
            return view('form.success')->with('message', $message);
        }

        return $next($request);
    }
}
