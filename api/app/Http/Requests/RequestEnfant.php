<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestEnfant extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            'nom'=>'required|string|max:250',
            'prenom'=>'required|string|max:250',
            'date_naissance' => [
                'required',
                'regex:/^\d{2}-\d{2}-\d{4}$/', // Format dd-mm-yyyy
            ],

            'niveau'=>'required|string|max:250',

            'photo'
        ];

    }
}
