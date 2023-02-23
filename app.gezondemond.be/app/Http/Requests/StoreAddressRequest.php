<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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

            'name' => 'string|max:255',
            'dictionary_geos_id' => 'integer',
            'street' => 'string|max:255|nullable',
            'number' => 'string|max:255|nullable',
            'opening_times' => 'string|max:255|nullable',
            'phone_1' => 'string|max:255|nullable',
            'phone_1_notices' => 'string|max:255|nullable',
            'phone_2' => 'string|max:255|nullable',
            'phone_2_notices' => 'string|max:255|nullable',
            'phone_3' => 'string|max:255|nullable',
            'phone_3_notices' => 'string|max:255|nullable',
            'email_1' => 'string|max:255|nullable',
            'email_1_notices' => 'string|max:255|nullable',
            'email_2' => 'string|max:255|nullable',
            'email_2_notices' => 'string|max:255|nullable',
            'email_3' => 'string|max:255|nullable',
            'email_3_notices' => 'string|max:255|nullable',
            'website' => 'string|max:255|nullable',
            'fin_naam_bank' => 'string|max:255|nullable',
            'fin_naam_persoon_of_organisatie' => 'string|max:255|nullable',
            'fin_iban_code' => 'string|max:255|nullable',
            'fin_bin_code' => 'string|max:255|nullable',
            'fin_bicc_code' => 'string|max:255|nullable',
            'fin_btw_nummer' => 'string|max:255|nullable',
            'fin_ondernemingsnummer' => 'string|max:255|nullable',
            'fin_opmerkingen' => 'string|max:255|nullable',
            'is_active' => 'boolean',
            'created_by_user_id' => 'integer|nullable',

        ];
    }
}
