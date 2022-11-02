<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class UserSettingsRequest extends FormRequest
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
            'password_current' => 'required|string|min:3',
            'password' => 'required|string|min:3|confirmed',
            'password_confirmation' => 'required|string|min:3',
        ];
    }

    public function validatePasswords(User $user)
    {
        if (
            !empty($this->password_current) &&
            Hash::check($this->password_current, $user->password)
        ) {
            if (
                $this->password === $this->password_confirmation &&
                $this->password_current !== $user->password &&
                $this->password_current !== $this->password
            ) {
                return true;
            }
        } else {
            return false;
        }
    }
}
