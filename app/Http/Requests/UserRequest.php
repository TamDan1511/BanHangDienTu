<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

        $checkUnicode = function ($attribute, $value, $fail) {
            if (mb_strlen($value) != strlen($value)) {
                $fail('Mật khẩu không chứa các ký tự có dấu');
            }
        };

        $pass = $this->input('password');

        $comparePass = function ($attribute, $value, $fail) use ($pass) {
            if (strcmp($value, $pass) != 0) {
                $fail('Mật khẩu xác thực chưa chính xác!');
            }
        };
        return [
            'name'  => ['bail', 'required', 'min:3'],
            'email' => ['bail', 'required', 'email:rfc,dns', 'unique:users'],
            'password'  => ['bail', 'required', 'min:8', $checkUnicode],
            'picture'  => ['bail', 'nullable', 'image'],
            'status'  => ['nullable'],
            'isAdmin'  => ['nullable'],
            'address'  => ['nullable'],
            'phone'  => ['nullable'],
            'confirmpassword' => ['bail', 'required', $comparePass]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'name.min' => 'Tên phải lớn hơn hoặc bằng 3 ký tự!',
            'email.required' => 'Email không được để trống!',
            'email.email' => 'Email không hợp lệ!',
            'email.unique' => 'Email đã tồn tại!',
            'password.required' => 'Mật khẩu không được để trống!',
            'password.min' => 'Tên phải lớn hơn hoặc bằng 8 ký tự!',
            'picture.image' => 'Sai định dạng!',  
            'confirmpassword.required' => 'Mật khẩu xác thực không được để trống!',      
        ];
    }
}
