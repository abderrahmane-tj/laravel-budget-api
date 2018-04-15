<?php

namespace App\Http\Requests;

class CreateAccountRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'balance' => 'required|numeric',
            'off_budget' => 'boolean',
            'type' => 'numeric'
        ];
    }
}
