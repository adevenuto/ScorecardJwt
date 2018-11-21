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
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        // \Log::info('fired off');
        // $token = JWTAuth::getToken();
        // $my_new_token = JWTAuth::refresh($token);
        // \Log::info($token);
        // \Log::info($my_new_token);
        // JWTAuth::setToken($my_new_token)->toUser();
        // $request->headers->set('Authorization','Bearer '.$my_new_token);
        // return $next($request);
        


        try {
            JWTAuth::parseToken();
            $token = JWTAuth::getToken();
        } catch (JWTException $e) {
            \Log::info('Here-1');
            abort(401, 'Token missing or badly formatted');
        } 

        try {
            JWTAuth::authenticate($token);
        } catch (TokenBlacklistedException $e) {
            \Log::info('Here-2');
            abort(401, 'Token "' . JWTAuth::manager()->decode($token, false)['jti'] . '" Blacklisted');
        } catch (TokenExpiredException $e) {      
            try {
                // Try to refresh token
                $token = JWTAuth::refresh($token);
                JWTAuth::setToken($token);    
                // Authenticate with new token, save user on request
                JWTAuth::authenticate($token);
            } catch(TokenExpiredException $e) {
                // If token refresh period has expired...
                // Return 401 status
                abort(401, $e->getMessage());
            }
        }
        return $next($request);
    }
}
