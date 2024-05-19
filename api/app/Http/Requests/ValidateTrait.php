<?php

namespace app\Http\Requests;

trait ValidateTrait
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
//            'role'=>'string',
            'name'=>'required|string|max:250',
            'email'=>'required|email|unique:users',
            'password'=>'required|string',
            'domaine'=>$this->rul,

        ];
    }


}
