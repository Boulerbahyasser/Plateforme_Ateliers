<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RequestUser extends FormRequest
{
    use ValidateTrait;
    public $rul='string';




}
