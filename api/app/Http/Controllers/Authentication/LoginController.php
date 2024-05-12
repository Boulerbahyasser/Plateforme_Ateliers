<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{


    public function login(Request $request)
    {
        try {

            $loginUserData = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string'
            ]);
            $user = User::where('email', $loginUserData['email'])->first();
            if ($user and Hash::check($loginUserData['password'], $user->password)) {
                $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;
                return response()->json([

                    'status'=>200,
                    'message'=>'login successfully ',
                    'access_token' => $token,

                ]);
            }else{
                return response()->json([

                    'status'=>401,
                    'message' => 'Invalid Credentials'

                ], 401);
            }
        }catch (ValidationException $e){
            return response()->json([

                'status'=>401,
                'message' => 'som thing wen wrong'

            ], 401);
        }


    }

    public function user()
    {
       return response()->json([
           'status'=>200,
           'user'=>Auth::user()
       ]);

    }

}
