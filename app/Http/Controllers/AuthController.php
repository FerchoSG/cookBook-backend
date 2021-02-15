<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
;

class AuthController extends Controller
{
    /**
    *
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
   public function authenticate(Request $request)
   {
       $credentials = $request->only('email', 'password');

       $user = User::where('email', $request->email)->first();

       if (! $user || ! Hash::check($request->password, $user->password)) {
           return response()->json([
               'message' => 'The provided credentials are incorrect.',
               'error'   => true
           ]);
       }

       return response()->json([
           "token"      => $user->createToken($request->email)->plainTextToken,
           "message"    => "Authenticated",
           "error"      => false
       ]);
   }

   public function register(Request $request)
   {
       $validation = $request->validate([

       ]);
   }

   public function failedAuthentication()
   {
       return response()->json([
            "error"     => true,
            "message"   => "Please provide a valid token"
       ]);
   }
}
