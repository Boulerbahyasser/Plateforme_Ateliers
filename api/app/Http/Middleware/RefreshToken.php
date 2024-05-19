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
    public function handle(Request $request, Closure $next): Response
    {
        $user=Auth::user();// isi utilisateurs qui naviguer dans website
        if ($user && $request->user()->currentAccessToken()){

            $token=$request->user()->currentAccessToken();// isi on prendre une records de personal_access_token table correspond at ce user

            $tokenExpirationTime=config('sanctum.Expiration',30);// cette est la default vleur pou expirer la token

            // calculate l' age de token depius elle creee
            $tokenAge=Carbon::parse($token->created_at)->diffInMinutes();

            if($tokenAge>=($tokenExpirationTime-5)){// test le temp qui va rest avant expiration de token ici on a 5 min
                // age>=5 min  une nouvelle token va generate et envoyer verse client puisque continue son navigation
                $token->delete();// suprimer la token actuelle

                $newToken=$user->createToken('-AuthToken')->plainTextToken;//envoyer nouveaux

                $response=$next($request);
                return $response->header('access-token',$newToken);
            }

        }
        return $next($request);
    }
}
