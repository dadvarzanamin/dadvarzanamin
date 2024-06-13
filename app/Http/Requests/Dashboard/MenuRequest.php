<?php

namespace App\Http\Requests\Dashboard;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

        ];
        //if($this->method() == 'POST') {
//            return [
//                'title'     => 'required|string|max:255',
//                'icon'      => 'string|max:250',
//                'submenu'   => 'required|numeric|max:2',
//                'class'     => 'required|string|max:255',
//                'controller'=> 'required|string|max:255',
//                'user_id'   => 'required|numeric',
//                'status'    => 'required|numeric|max:2',
//            ];
//        }else {
//            return [
//                'title' => 'required|max:250',
//                'description' => 'required',
//            ];
//        }
    }
}
