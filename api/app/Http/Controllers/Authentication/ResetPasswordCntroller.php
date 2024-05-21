<?php

namespace App\Http\Controllers\Authentication;
use App\Http\Controllers\Controller;
use App\Mail\SendResetPassword;
use App\Models\ResetPasswordToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ResetPasswordCntroller extends Controller
{
    public function RessetPasswordEmail(Request $request)
    {
        try {
            //validate the email
            $validemail = $request->validate([
                'email' => 'required|email|exists:users'
            ]);

            if ($validemail) {
                $data = [
                    'email' => $validemail['email'],
                    'token' => Str::random(64),
                    'created_at' => now()
                ];
                ResetPasswordToken::create($data);
                Mail::to($validemail['email'])->send(new SendResetPassword($data));
                return response()->json([
                    'status' => 200,
                    'token'=>$data['token'],
                    'message' => 'check you email inbox,we sent ressset password linck'
                ]);


            }
        }catch (ValidationException $e){
            // Return validation errors
            return response()->json([
                'status' => 422,
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function ResetPassword(Request $requestresetpassword, $token)
    {
        // Retrieve the reset token record
        $resetexist = ResetPasswordToken::where('token', $token)->first();

        if($resetexist){
        // Retrieve the user by email associated with the token
            $user = User::where('email', $resetexist->email)->first();

            if ($user) {
                // Validate the new password

                $NewPassword = $requestresetpassword->validate([
                    'password' => 'required|string|confirmed|min:4',
                ]);
                // Update the user's password
                $user->password = bcrypt($NewPassword['password']);
                $user->save();

                // Optionally, delete the reset token record after successful reset
                $resetexist->delete();

                return response()->json([
                    'status' => 200,
                    'message' => 'Password reset successfully',
                ]);
        } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'User not found',
                ], 404);
            }
        }

        return response()->json([
            'status' => 400,
            'message' => 'Invalid or expired token',
        ], 400);
    }
}


