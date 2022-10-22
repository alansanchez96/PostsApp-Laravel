<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => 'required|string|email|max:60',
            'password' => 'required|string|min:3'
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
            'email.required' => 'El campo Email no puede ir vacío',
            'email.email' => 'El Email no es un formato válido',
            'password.min' => 'La contraseña debe contener al menos 3 caracteres',
            'password.required' => 'El campo password no puede ir vacío'
        ];
    }
}
