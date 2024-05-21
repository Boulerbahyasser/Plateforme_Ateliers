<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestAnimateur;
use App\Http\Requests\RequestUser;
use App\Mail\SendEmails;
use App\Mail\SendMessage;
use App\Models\Administrateur;
use App\Models\Animateur;
use App\Models\Father;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RegistrationController extends Controller
{
    // need activation thier emails
    public function RegisterParent(RequestUser $requestUser)
    {
        try {
            $registerdata = $requestUser->validated();
            $registerdata['password'] = bcrypt($registerdata['password']);
            $registerdata['remember_token'] = Str::random(40);

            $registerdata['role']='parent';
            $newUser = User::create($registerdata);
            Father::create(['user_id' => $newUser->id]);
           // Mail::to($newUser->email)->send(new SendEmails($newUser));

            return response()->json([
                'status' => 200,
                'message' => 'verify your email ,link sent to your inbox'
            ],200);

        } catch (ValidationException $e) {
            return response()->json([

                'message' => 'sorry something went wrong',
                'erros' => $e->getMessage()
            ], 500);
        }
    }

    // not needed activation emails
    public function RegisterAdmin(RequestUser $requestUser)
    {
        try {
            $registerdata = $requestUser->validated();
            $registerdata['password'] = bcrypt($registerdata['password']);
            $registerdata['email_verified_at'] = now();
            $registerdata['role']='admin';

            // send message to new admin
            $SuperAdmin=Auth::user();
            $newUserAdmin = User::create($registerdata);
            Administrateur::create(['user_id' => $newUserAdmin->id]);
            Mail::to($newUserAdmin->email)->send(new SendMessage($SuperAdmin,$newUserAdmin));

            return response()->json([
                'message' => 'you are added the  admin in successfully '
            ],200);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'sorry something went wrong',
                'erros' => $e->getMessage()
            ], 500);
        }

    }
    public function RegisterAnimateur(RequestAnimateur $requestAnimateur)
    {
        try {
            // isi on faire validation de data that enter par "Admin"
            $registerdata = Arr::except($requestAnimateur->validated(), ['domaine']);// ici domaine just car jai l'heritage d'un trait ValidateTriat
            $registerdata['password'] = bcrypt($registerdata['password']);//hash + make signiture pour password
            $registerdata['email_verified_at'] = now();
            $registerdata['role']='animator';

            $SuperAdmin=Auth::user();
            $newUserAnimateur = User::create($registerdata);// ajouter animateur dans tableux users
            Animateur::create([

                'user_id' => $newUserAnimateur->id,
                'domaine'=>$requestAnimateur->validated()['domaine']

            ]);
//             envoyer un email pour aninimateur

            Mail::to($newUserAnimateur->email)->send(new SendMessage($SuperAdmin,$newUserAnimateur));

            return response()->json([
                'message' => 'animator added successfully',
            ],200);
        }catch(ValidationException $e){
            return response()->json([

                'message' => 'sorry something went wrong',
                'erros' => $e->getMessage()
            ], 500);
        }

    }








}
