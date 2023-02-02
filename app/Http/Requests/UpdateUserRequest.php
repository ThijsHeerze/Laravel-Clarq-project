<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
//        if (request()->route()->getName() === 'users.update') {
//            $id = request()->route()->parameter('user');
//        } else {
//            $id = 0;
//        }

        return [
            //voorwaarden
            'name' => 'required|max:255',
            'email' => 'required|max:255',
//            'email' => 'required|unique:users,email,'.$id,
            'password' => 'required|min:8|max:255'
        ];
    }
}
