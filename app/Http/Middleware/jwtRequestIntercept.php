<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Token;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class jwtRequestIntercept
{
    public function handle($request, Closure $next)
    {   
        $token = JWTAuth::getToken();
        try {
            $user = JWTAuth::authenticate($token);
        } catch (TokenExpiredException $e) {
            try {
                $token = JWTAuth::refresh($token);
                JWTAuth::setToken($token);    
                $user = JWTAuth::authenticate($token);
                $request->headers->set('Authorization','Bearer '.$token);
            } catch(TokenExpiredException $e) {
                abort(401, 'Token can no longer be refreshed'); 
            }
        }
        return $next($request);
    }
}
