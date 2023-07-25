<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
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
            //
            'forename' => 'max:255|required',
            'name' => 'max:255|required',
            'birthday' => 'date|nullable',
            'sex' => 'string|max:255|nullable',
            'function' => 'string|max:255|nullable',
            'volunteer' => 'boolean|nullable',
            'oral_coach' => 'boolean|nullable',
            'coordinator' => 'boolean|nullable',
            'details' => 'string|nullable',
            'phone' => 'string|max:255|nullable',
            'email' => 'email|max:255|nullable',
            'presence' => 'string|max:255|nullable',
            'active_from' => 'date|nullable',
            'inactive_from' => 'date|nullable',
            'is_active' => 'boolean|nullable',
            'created_by_user_id' => 'integer|nullable'
        ];
    }

    public function messages()
    {
        return [
            'forename.required' => 'Het veld Voornaam is verplicht',
            'name.required' => 'Het veld Naam is verplicht',
        ];
    }
}
