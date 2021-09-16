<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'position' => ['bail', 'required', 'integer'],
            'description' => ['bail', 'required'],
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
            'position.required' => 'Vị trí không được để trống!',
            'position.integer' => 'Vị trí phải là 1 số nguyên!',
            'description.required' => 'Mô tả không được để trống!',
            'url.url' => 'Url không hợp lệ!',
            'url.required' => 'Url không được để trống!'
        ];
    }
}
