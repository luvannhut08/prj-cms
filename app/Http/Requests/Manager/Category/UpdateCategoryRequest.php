<?php

namespace App\Http\Requests\Manager\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'category_name' => [
                'required',
                'string',
            ],
            'level' => [
                'required',
                'integer',
            ],
            'parent' => [
                'integer',
            ],
        ];
    }
}
