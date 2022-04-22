<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
{

    /**
     * @return bool
     */

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
        ];
    }
}
