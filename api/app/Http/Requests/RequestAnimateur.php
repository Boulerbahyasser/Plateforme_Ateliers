<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAnimateur extends FormRequest
{
    use ValidateTrait;
    public $rul='required|string|max:250';



}
