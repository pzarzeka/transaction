<?php

namespace App\Http\Middleware;

use App\Exceptions\BadContentTypeException;
use Closure;
use Illuminate\Http\Request;

class RequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws BadContentTypeException
     */
    public function handle(Request $request, Closure $next)
    {
        if (strtolower($request->header('Content-Type')) !== 'application/json') {
            throw new BadContentTypeException();
        }

        return $next($request);
    }
}
