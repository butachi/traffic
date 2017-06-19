<?php namespace Modules\System\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|unique:tbl_users|email',
            'password' => 'required|min:3|confirmed',
            'roleid' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }
}
