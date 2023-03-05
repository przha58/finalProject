<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class college extends FormRequest
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
        return [
            
            'name'=>'required',
            'type'=>'required',
            'DeanName'=>'required',
            'DeanEmail'=>'required',
            'address'=>'required',
            'gps_lon'=>'required',
            'gps_lat'=>'required'
        ];
    }
}
