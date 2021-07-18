<?php

namespace App\Http\Controllers;

use App\Traits\message_api;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use message_api;

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('TutsForWeb')->accessToken;
        return $this->returnData($token,"data stored on success");

    }



    public function login(Request $request){
        try {
            $rules = [
                "email" => "required",
                "password" => "required"
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }

            //login

            $credentials = $request->only(['email', 'password']);

            $token = Auth::guard('user-api')->attempt($credentials);

            if (!$token)
                return $this->returnError('E001', 'بيانات الدخول غير صحيحة');

            $user = Auth::guard('user-api')->user();
            $user->api_token = $token;
            //return token
            return $this->returnData('user-api', $user);

        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }

    }

    public function logout(Request $request){

        $token= $request->header('auth-token');

        //if we get the token of the user do the logout by the code on the if statements
        if ($token){
            try {

                JWTAuth::setToken($token)->invalidate(); // get the token of user and do the logout
            }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
                return  $this -> returnError('','some thing went wrongs');
            }
            return $this->returnSuccessMessage('Logged out successfully');

        }else{

            return $this->returnError('00000',"there is an error on logout");

        }

    }

}
