<?php

namespace App\Http\Requests;

use App\Http\Requests\ValidateTrait;
use Illuminate\Foundation\Http\FormRequest;

class RequestUser extends FormRequest
{
    use ValidateTrait;
    public $rul='string';




}
