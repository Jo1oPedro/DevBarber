<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AuthFormRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:4',
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'O campo :attribute é obrigatorio',
            'name.string' => 'O campo :attribute precisa ser um texto',
            'name.max' => 'O limite de caracteres para o campo :attribute é 100',
            'email.required' => 'O campo :attribute é obrigatorio',
            'email.string' => 'O campo :attribute precisa ser uma string',
            'email.unique' => 'O email inserido já foi cadastrado',
            'password.required' => 'O campo senha é obrigatorio',
            'password.string' => 'O campo senha precisa ser um texto',
            'password.min' => 'O campo senha precisa ter pelo menos 4 caracteres', 
        ];
    }
    
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }

}
