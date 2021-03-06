<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:200', 
            'apellidos' => 'required|min:3|max:250',
            'password' => 'required|min:8|max:30',
            'email' =>'required|email|unique:users',
            'telefono'=>'required|numeric|digits_between:7,10',
            'admin'=>'required',
            'roles'=>'required'
        ];
    }
}
