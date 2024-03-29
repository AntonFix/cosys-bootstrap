<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return true;
        return Auth::check();
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
            'title' => 'max:255|required',
            'details' => 'string|nullable',
            'app_code_id' => 'integer|nullable',
            'app_status_id' => 'integer|nullable',
            'created_by_user_id' => 'integer|nullable',
            'assigned_with_user_id' => 'integer|nullable',
            'assigned_with_person_id' => 'integer|nullable',
            'start_date' => 'date|nullable',
            'start_time' => 'string|nullable',
            'end_date' => 'date|nullable',
            'end_time' => 'string|nullable',
            'attachment' => 'nullable',
            'archived' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Het veld Titel is verplicht',
        ];
    }
}
