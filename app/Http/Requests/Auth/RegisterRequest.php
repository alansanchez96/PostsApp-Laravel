<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:60',
            'email' => 'required|email|string|max:255|unique:users',
            'password' => 'required|min:3|max:16'
        ];
    }

    /**
     * Mensajes de validación personalizados
     *
     * @return void
     */
    public function messages()
    {
        return [
            'name.required' => 'El campo Nombre no puede ir vacío',
            'name.max' => 'El campo Nombre no puede exceder los 60 caracteres',
            'email.required' => 'El campo Email no puede ir vacío',
            'email.email' => 'El Email no es un formato válido',
            'password.min' => 'La contraseña debe contener al menos 3 caracteres',
            'password.max' => 'La contraseña excede el máximo de 16 caracteres',
            'password.required' => 'El campo password no puede ir vacío'
        ];
    }
}
