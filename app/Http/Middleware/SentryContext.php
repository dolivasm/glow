<?php

namespace App\Http\Middleware;

use Closure;
use Context;
use Illuminate\Support\Facades\Auth;

class SentryContext
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
        if (app()->bound('sentry')) {
            /** @var \Raven_Client $sentry */
            $sentry = app('sentry');

            // Add user context
            if (Auth::check()) {
                $sentry->user_context([
                        'id' => $request->user()->id,
                        'role_id' => $request->user()->role_id,
                        'email' => $request->user()->email,
                     ]);
            } else {
                $sentry->user_context(['id' => 'guest']);
            }
        }

        return $next($request);
    }
}
