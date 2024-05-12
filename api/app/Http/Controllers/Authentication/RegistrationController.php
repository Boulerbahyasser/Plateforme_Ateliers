<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestAnimateur;
use App\Http\Requests\RequestEnfant;
use App\Http\Requests\RequestUser;
use App\Mail\SendEmails;
use App\Mail\SendMessage;
use App\Models\Administrateur;
use App\Models\Animateur;
use App\Models\Enfant;
use App\Models\Father;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RegistrationController extends Controller
{
    public function RegisterAdminParent(RequestUser $requestUser)
    {
        try {
            $registerdata = $requestUser->validated();
            $registerdata['password'] = bcrypt($registerdata['password']);
            $registerdata['remember_token'] = Str::random(40);

            $user = User::create($registerdata);

            if($registerdata['role']='0'){

                Administrateur::create(['user_id' => $user->id]);

            }else Father::create(['user_id' => $user->id]);

            Mail::to($user->email)->send(new SendEmails($user));

            return response()->json([
                'status' => 200,
                'message' => 'verify your email ,link sent to your inbox'
            ],200);

        } catch (ValidationException $e) {
            return response()->json([
                'status'=>400,
                'message' => 'sorry something went wrong',
                'erros' => $e->getMessage()
            ], 400);
        }

    }

    public function RegisterAnimateur(RequestAnimateur $requestAnimateur)
    {
        try {
            // isi on faire validation de data that enter par "Admin"
            $registerdata = Arr::except($requestAnimateur->validated(), ['domaine']);// ici domaine just car jai l'heritage d'un trait ValidateTriat
            $registerdata['password'] = bcrypt($registerdata['password']);//hash + make signiture pour password
            $registerdata['remember_token'] = Str::random(40);// cette token est pour verifie l'email
            $registerdata['email_verified_at'] = now();

            $user = User::create($registerdata);// ajouter animateur dans tableux users
            Animateur::create([

                'user_id' => $user->id,
                'domaine'=>$requestAnimateur->validated()['domaine']

            ]);
            // envoyer un email pour aninimateur
//            $message='hi, '.$user->name.' your now an animator of '.$user->domaine.' added by '.Auth::user()->name.'.' ;
//            Mail::to($user->email)->send(new SendMessage($user,$message));

            return response()->json([
                'status' => 200,
                'message' => 'animator added successfully',
            ],200);
        }catch(ValidationException $e){
            return response()->json([
                'status'=>400,
                'message' => 'sorry something went wrong',
                'erros' => $e->getMessage()
            ], 400);
        }

    }
    public function RegisterEnfant(RequestEnfant $requestEnfant)
    {
        try {

            $user = Auth::user();
            $registerdata = $requestEnfant->validated();
            $registerdata['father_id'] = Father::where('user_id', $user->id)->first()->id;

            $enfant = Enfant::create($registerdata);

//            Mail::to($user->email)->send(new SendEmails($user));
            return response()->json([
                'status' => 200,
                'message' => 'registering successfully'
            ],200);

        }catch(ValidationException $e){

            return response()->json([
                'status'=>422,
                'message' => 'soory registrering fieled',
                'erros'=>$e->getMessage()
            ], 422);

        }


    }







}
