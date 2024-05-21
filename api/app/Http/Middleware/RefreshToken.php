<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RefreshToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
//    public function handle(Request $request, Closure $next): Response
//    {
//        $user=Auth::user();// isi utilisateurs qui naviguer dans website
//        if ($user && $request->user()->currentAccessToken()){
//
//            $token=$request->user()->currentAccessToken();// isi on prendre une records de personal_access_token table correspond at ce user
//
//            $tokenExpirationTime=config('sanctum.Expiration',2);// cette est la default vleur pou expirer la token
//
//            // calculate l' age de token depius elle creee
//            $tokenAge=Carbon::parse($token->created_at)->diffInMinutes();
//
//            if($tokenAge>=($tokenExpirationTime-1)){// test le temp qui va rest avant expiration de token ici on a 5 min
//                // age>=5 min  une nouvelle token va generate et envoyer verse client puisque continue son navigation
//                $token->delete();// suprimer la token actuelle
//
//                $newToken=$user->createToken('-AuthToken')->plainTextToken;//envoyer nouveaux
//
//                $response=$next($request);
//                return $response->header('access-token',$newToken);
//            }
//
//        }
//        return $next($request);
//    }


    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user && $request->user()->currentAccessToken()) {

            $token = $request->user()->currentAccessToken();

            $tokenExpirationTime = config('sanctum.Expiration', 2);

            // Calculate the age of the token since it was created
            $tokenAge = Carbon::parse($token->created_at)->diffInMinutes();

            if ($tokenAge >= ($tokenExpirationTime - 1)) {
                // If the token is about to expire (less than 1 minute left)
                $token->delete(); // Delete the current token

                $newToken = $user->createToken($user->name . '-AuthToken')->plainTextToken;

                $response = $next($request);

                // Add the new token to the JSON response
                $response->setContent(json_encode(array_merge(
                    json_decode($response->getContent(), true),
                    ['access_token' => $newToken]
                )));

                return $response;
            }
        }
        return $next($request);
    }
}
