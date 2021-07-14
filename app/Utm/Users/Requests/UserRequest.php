<?php

namespace App\Utm\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UserRequest
 * @package App\Utm\Users\Requests
 */
class UserRequest extends FormRequest
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
        if (!$this->user) {
            return [
                "name" => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                "password" => ['required', 'string', 'min:8', 'confirmed'],
                'roles' => ['required', 'exists:roles,id'],
                'permissions' => ['sometimes', 'exists:permissions,id'],
            ];
        }

        return [
            "name" => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user)],
            "password" => ['sometimes', 'required', 'string', 'min:8', 'confirmed'],
            'roles' => ['required', 'exists:roles,id'],
            'permissions' => ['sometimes', 'exists:permissions,id'],
        ];
    }
}
