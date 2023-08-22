<?php

namespace Src\Modules\Auth\Infrastructure\Http\Request;

use Src\Common\Interfaces\Laravel\FormRequest;

class PasswordResetRequest extends FormRequest
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
            'email' => 'required|email|max:255'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'El campo Email no puede ir vacío',
            'email.email' => 'El Email no es un formato válido'
        ];
    }
}
