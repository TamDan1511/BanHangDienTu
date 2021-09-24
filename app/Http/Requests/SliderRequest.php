<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        if(is_string($this->picture)){
            $input['picture'] = '';   
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
            'picture' => ['bail', 'required', 'image'],
            'title' => ['bail', 'required', 'min:10'],
            'content' => ['bail', 'required'],
            'status' => ['nullable', 'integer'],
            'url' => ['bail', 'required', 'url']
        ];

        if($this->has('_method')){
            $rules['picture'] = ['nullable', 'image'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'picture.required' => 'Hình ảnh không được để trống!',
            'picture.image' => 'Hình ảnh sai định dạng!',
            'title.required' => 'Tiêu đề không được để trống!',
            'title.min' => 'Tiêu đề phải từ 10 ký tự!',
            'content.required' => 'Mô tả không được để trống!',
            'url.url' => 'Url không hợp lệ!',
            'url.required' => 'Url không được để trống!'
        ];
    }
}
