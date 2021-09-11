<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

    protected function prepareForValidation(){
        $input = $this->all();
        if(!empty($this->time_discount)){
            $datetime = new \DateTime($this->time_discount);
            $time_discount = $datetime->format('Y-m-d H:i:s');
            $input['time_discount'] = $time_discount;
             
        }

        if(is_string($this->picture)){
            $input['picture'] = '';    
        }

        foreach($this->all() as $key => $value){
            if($value == 'null'){
                $input[$key] = null;
            }
        }

        $this->replace($input);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        $rules = [
            'name'          => ['bail', 'required', 'min:3'],
            'price'         => ['bail', 'required', 'integer'],
            'quantities'    => ['bail', 'required', 'integer'],
            'discount'      => ['bail', 'nullable', 'integer'],
            'picture'       => ['bail', 'required', 'image'],
            'status'        => ['integer'],
            'time_discount' => ['nullable', 'date_format:Y-m-d H:i:s'],
            'category_id'   => ['required', 'gt:0'],
            'description'   => ['nullable'],
            'options'       => ['nullable', 'json']
        ];

        if($this->has('_method')){
            $rules['picture'] = ['bail', 'nullable', 'image'];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'             => 'Tên sản phẩm không được để trống!',
            'name.min'                  => 'Tên sản phẩm phải từ 3 ký tự!',
            'price.required'            => 'Giá sản phẩm không được để trống!',
            'price.integer'             => 'Giá sản phẩm phải là 1 số nguyên!',
            'quantities.required'       => 'Số lượng sản phẩm không được để trống!',
            'quantities.integer'        => 'Số lượng sản phẩm phải là 1 số nguyên!',
            'discount.integer'          => 'Giảm giá sản phẩm phải là 1 số nguyên!',
            'picture.required'          => 'Hình ảnh không được để trống!',
            'picture.image'             => 'Hình ảnh sai định dạng!',
            'status.integer'            => 'Trạng thái phải là 1 số nguyên!',
            'time_discount.date_format' => 'Thời gian giảm giá không hợp lệ!',
            'category_id.required'      => 'Tên sản phẩm không được để trống!',
            'category_id.gt'            => 'Bạn chưa chọn danh mục!',
            'options.json'              => 'Thông số sai định dạng!' 
        ];
    } 
}
