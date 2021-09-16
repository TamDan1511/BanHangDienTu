<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name' => ['bail', 'required', 'min:3'],
            'url' => ['bail', 'required', 'url'],
            'status' => ['nullable', 'integer']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên menu không được để trống!',
            'name.min' => 'Tên menu phải từ 3 ký tự!',
            'url.required' => 'Url không được để trống!',
            'url.url' => 'Url không hợp lệ!'
        ];
    }
}
