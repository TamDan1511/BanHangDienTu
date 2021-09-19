<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'      => ['required', 'min:10'],
            'content'   => 'required',
            'status'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tên bài viết không được để trống!',
        ];
    }
}
