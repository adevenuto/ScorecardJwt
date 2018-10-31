<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;
use DB, Hash, Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'verifyUser']]);
    }

    public function login(Request $request) {
        // Check is user verified there email
        $user = User::where('email', '=', $request->email)->first();
        if($user) {
            $user_verified = $user->is_verified;
            if ($user_verified == 0) {
                return response()->json(['error' => ['emailNotVerified' => 'user email not verified']]);
            }
        }
        // If user is verified attemp login 
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $input = $request->only('email', 'password');
        $validator = Validator::make($input, $rules);
        if($validator->fails()) {
            $error = $validator->messages()->toJson();
            return response()->json(['success'=> false, 'error'=> $error]);
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'is_verified' => 1
        ];
        try {
            // try to verify the credentials
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => ['authError' => 'Username or password are incorrect']]);
            }
        } catch (JWTException $e) {
            // making the token failed
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        // credentials passed, create token
        return $this->respondWithToken($token);
    }

    public function register(Request $request) {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ];
        $input = $request->only(
            'name',
            'email',
            'password'
        );
        $validator = Validator::make($input, $rules);
        if($validator->fails()) {
            $error = $validator->messages()->toJson();
            return response()->json(['success'=> false, 'error'=> $error]);
        }
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $user = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password)]);
        $verification_code = str_random(30); //Generate verification code
        DB::table('user_verifications')->insert(['user_id'=>$user->id,'token'=>$verification_code]);
        $subject = "Please verify your email address.";
        Mail::send('email.verify_email', ['name' => $name, 'verification_code' => $verification_code],
            function($mail) use ($email, $name, $subject){
                $mail->from(getenv('FROM_EMAIL_ADDRESS'), "From User/Company Name Goes Here");
                $mail->to($email, $name);
                $mail->subject($subject);
            });
        return response()->json(['success'=> true, 'message'=> 'Thanks for signing up! Please check your email to complete your registration.']);
    }

    public function verifyUser($verification_code) {
        $check = DB::table('user_verifications')->where('token',$verification_code)->first();
        if(!is_null($check)){
            $user = User::find($check->user_id);
            if($user->is_verified == 1){
                return response()->json([
                    'success'=> true,
                    'message'=> 'Account already verified..'
                ]);
            }
            $user->update(['is_verified' => 1]);
            DB::table('user_verifications')->where('token',$verification_code)->delete();
            return redirect('/login');
        }
        return response()->json(['success'=> false, 'error'=> "Verification code is invalid."]);
    }

    public function authUser() {
        return response()->json(auth('api')->user());
    }

    public function logout() {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh() {
        return $this->respondWithToken(auth('api')->refresh());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     */

    protected function respondWithToken($token) {
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
