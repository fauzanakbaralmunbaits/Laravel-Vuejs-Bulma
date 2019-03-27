<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CrudRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            //
            'name'=>'required|max:191',
            // 'phone'=>'required|digits:10|numeric',
            'phone'=>'required|max:10',
            'email'=>'required|email|unique:crud_controllers,email,'.$request->id
        ];
    }
}
