<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
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
        $user = Auth::user();
        return [
            // 'email' => ['required',  'email', 'max:50'],
            'password'  =>  'required',
        ];
    }

    public function messages()
    {
        return [

            // 'email.required' => 'Please enter company email address.',
            // 'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Please enter a password.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status'=>0,
                'error'=>$validator->errors()->toArray()
            ])
        );
    }
}
