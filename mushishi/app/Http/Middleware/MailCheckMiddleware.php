<?php

namespace App\Http\Middleware;

use Closure;

class MailCheckMiddleware
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
        $user = auth('web')->user();
        if (auth('web')->check() && $user->mail_status == 0) {
            return redirect()->route('check_mail_show');
        }

        return $next($request);
    }
}
