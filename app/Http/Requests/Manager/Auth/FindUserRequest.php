<?php

namespace App\Http\Requests\Manager\Auth;

use Illuminate\Foundation\Http\FormRequest;

class FindUserRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return \string[][]
     */
    public function rules()
    {
        return [
            'with' => [
                'sometimes',
                'string',
            ],
        ];
    }
}
