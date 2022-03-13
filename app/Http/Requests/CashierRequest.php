<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CashierRequest extends FormRequest
{
    /**
     * @var bool
     */
    // protected $stopOnFirstFailure = true;
    
    /**
     * @return bool
     */
    public function authorize()
    {
        return Auth::check(); 
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required'
        ];
    }
}
