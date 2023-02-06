<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'title' => 'string|max:255',
            'details' => 'text|nullable',
            'app_code_id' => 'unsignedBigInteger|nullable',
            'app_status_id' => 'unsignedBigInteger|nullable',
            'created_by_user_id' => 'unsignedBigInteger|nullable',
            'assigned_with_user_id' => 'unsignedBigInteger|nullable',
            'assigned_with_person_id' => 'unsignedBigInteger|nullable',
            'start_date' => 'date|nullable',
            'start_time' => 'time|nullable',
            'end_date' => 'date|nullable',
            'end_time' => 'time|nullable',

            'attachment' => 'string|nullable',

            'archived' => 'boolean',
        ];
    }
}
