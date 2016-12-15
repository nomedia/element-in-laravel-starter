<?php

namespace App\Http\Middleware;

use Closure;

class MigaoWechatAuth
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

        dump($request->all());

        return $next($request);
    }
}
