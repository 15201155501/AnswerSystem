<?php

namespace App\Http\Middleware;

use Closure,Session;

class checkstu
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
        if (!Session::get('u_id')){
            echo "<script>alert('请先登陆');location.href='".url('/')."';</script>";
            exit();
        }
        return $next($request);
    }
}
