<?php

namespace app\Http\Requests;

use App\Http\Requests\ValidateTrait;
use Illuminate\Foundation\Http\FormRequest;

class RequestAnimateur extends FormRequest
{
    use ValidateTrait;
    public $rul='required|string|max:250';



}
