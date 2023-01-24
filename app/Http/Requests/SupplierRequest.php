<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SupplierRequest extends FormRequest
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
            "name"=>"required|string|min:5",
            "phone"=>"required|string",
            "email"=>"required|string",
            "address"=>"required|string",
            "status"=>"nullable",
            "created_by"=>"required|integer",
            "updated_by"=>"required|integer",
        ];
    }
    public function messages()
    {
        return[
            "name.required"=>"Name is required",
            "name.string"=>"Name is string type",
            "name.min"=>"Name is least 5 characters",
            "phone.required"=>"Phone number is required",
            "phone.string"=>"Phone number is string type",
            "email.required"=>"Email is required",
            "email.string"=>"Email is string type",
            "address.required"=>"Address is required",
            "address.string"=>"Address is string type",
            "created_by.required"=>"Created_by id is required",
            "created_by.integer"=>"Created_by is integer type",
            "updated_by.required"=>"Updated_by id is required",
            "updated_by.integer"=>"Updated_by is integer type",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error'   => true,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
