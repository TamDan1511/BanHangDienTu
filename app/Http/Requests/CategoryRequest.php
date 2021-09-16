<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $input = $this->all();
        if(is_string($this->icon)){
            $input['icon'] = '';
            $this->replace($input);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'      => ['bail', 'required', 'min:2'],
            'status'    => ['nullable'],
            'parent_id' => ['nullable'],
            'icon'      => ['nullable', 'image']
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống!',
            'name.min'      => 'Tên danh mục phải từ 2 ký tự!',
            'icon.image'      => 'Hình ảnh không hợp lệ!'
           
        ];
    } 
}
