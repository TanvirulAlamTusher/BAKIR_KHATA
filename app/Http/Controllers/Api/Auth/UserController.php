<?php

namespace App\Http\Controllers\Api\Auth;

use URL;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;

use App\Helper\ResponseHelper;
use App\Mail\ResetPAsswordEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
   public function Login(Request $request){

    try{
        $user = User::where('email', $request->input('email'))->first();

        if(!$user || !Hash::check($request->input('password'), $user->password)){
         return ResponseHelper::Out('failure','credentials are incorrect', '401', 401);

        }
        else{
           $token = $user->createToken('auth_token')->plainTextToken;

           return response()->json([
              'access_token' => $token,
              'token_type' => 'Bearer',
           ],200);
        }

    }catch(Exception $e){
        return ResponseHelper::Out('failure','Something Went Worng', '500', 500);
    }


   }

   public function Logout(Request $request){
     try{
        auth()->user()->tokens()->delete();
        return ResponseHelper::Out('success','logout', '200', 200);

     }catch(Exception $e){
        return ResponseHelper::Out('failure','Something Went Worng', '500', 500);
     }

   }


   public function Register(Request $request)
   {
       // Define validation rules
       $rules = [
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users',
           'password' => 'required|string|min:6|confirmed',
       ];

       // Validate the request
       $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
           return response()->json([
               'errors' => $validator->errors(),
               'code' => '422'
           ], 422);
       }

       // If validation passes, create the user
       $user = User::create([
           'name' => $request->input('name'),
           'email' => $request->input('email'),
           'password' => Hash::make($request->input('password')),
       ]);

       // Return a successful response
       $token = $user->createToken('auth_token')->plainTextToken;

       return response()->json([
          'access_token' => $token,
          'token_type' => 'Bearer',
       ],201);

   }

   public function sendResetOtpEmail(Request $request){
    $rules = [
        'email' => 'required|string|email|max:255|exists:users,email',

       ];

       $validator = Validator::make($request->all(), $rules);
       if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
     }


     $otp = rand(1000,9999);
     User::where()
     Mail::to($request->email)->send(new ResetPasswordEmail($otp));
     return ResponseHelper::Out('success','OTP sent to your email', '200', 200);


   }

   public function resetPassword(){




   }
}
