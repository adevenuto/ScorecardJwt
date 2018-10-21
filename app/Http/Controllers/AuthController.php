<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use App\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function login()
    {
        $credentials = request(['name', 'email', 'password']);
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }
        public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        $user = User::first();
        $token = JWTAuth::fromUser($user);
        
        return Response::json(compact('token'));
    }
    public function authUser()
    {
        return response()->json(auth('api')->user());
    }
    /**
     * Log the user out (Invalidate the token).
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    /**
     * Refresh a token.
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'user' => $this->guard()->user(),
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function guard() {
    	return \Auth::Guard('api');
    }
}
