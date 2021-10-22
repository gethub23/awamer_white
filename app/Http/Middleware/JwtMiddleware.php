<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Response;
use App\Traits\Responses;

class JwtMiddleware
{
    use Responses;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
             JWTAuth::parseToken()->authenticate();
        }
        catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                 $this->response('failed',__('auth.invalid_token'));
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                 $this->response('failed',__('auth.expired_token'));
            }else{
                 $this->response('failed',__('auth.invalid_token'));
            }
        }
        return $next($request);
    }


}
