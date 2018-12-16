<?php

namespace App\Http\Middleware;

use Closure;
use Carbon;
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
        try {
            JWTAuth::parseToken();
            $token = JWTAuth::getToken();
            
           
        } catch (JWTException $e) {
            abort(401, 'Token missing or badly formatted');
        } 

        

        try {
            $user = JWTAuth::authenticate($token);
        } catch (TokenBlacklistedException $e) {
            abort(401, 'Token "' . JWTAuth::manager()->decode($token, false)['jti'] . '" Blacklisted');
        } catch (TokenExpiredException $e) {      
            try {
                // Try to refresh token
                $token = JWTAuth::refresh($token);
                JWTAuth::setToken($token);
                JWTAuth::authenticate($token);    
                $request->headers->set('Authorization','Bearer '.$token);
            } catch(TokenExpiredException $e) {
                // If token refresh period has expired...
                abort(401, 'Token Expired');
            }
        }
        $tokenExp = JWTAuth::setToken($token)->getPayload()['exp'];
        // \Log::info($tokenExp);
        // $tokenExpHuman = Carbon::createFromTimestamp($tokenExp)->addHours(6)->toDayDateTimeString();
        // \Log::info(Carbon::now()->addHours(6)->toDayDateTimeString());
        // \Log::info($tokenExpHuman);
        return $next($request);
    }
}
