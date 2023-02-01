<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDebugRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Set back to false!!
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
            'nameString' => 'string|max:255',
            'nameChar' => 'nullable',
            'integer' => 'nullable|integer',
            'decimal' => 'nullable|decimal:2,2',
            'date' => 'nullable|date',
            'dateTime' => 'nullable',
            //'uploadedFile' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'uploadedFile' => 'nullable',
        ];
    }
}
