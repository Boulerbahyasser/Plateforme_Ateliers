<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{

    public function verifyemail($token)
    {
        $user = User::where('remember_token', $token)->first();
        if ($user) {
            // Définir la date de vérification de l'email
            $user->email_verified_at = now();
            // Enregistrer les modifications
            $user->save();

            return response()->json([
                'status'=>200,
                'message' => 'Email verified successfully'
            ]);
        } else {
            return response()->json([
                'status'=>404,
                'message' => 'User not found or token expired'
            ], 404);


        }
    }
}
