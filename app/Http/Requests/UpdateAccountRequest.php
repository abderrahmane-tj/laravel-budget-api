<?php

namespace App\Http\Requests;

class UpdateAccountRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'filled',
          'balance' => 'sometimes|numeric|nullable',
          'off_budget' => 'boolean',
          'type' => 'numeric'
        ];
    }
}