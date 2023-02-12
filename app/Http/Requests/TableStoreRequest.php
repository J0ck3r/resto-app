<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TableStoreRequest extends FormRequest
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
            'table_number' => ['required', Rule::unique('tables')->where(function ($query) 
                {
                    return $query->where('restaurant_id', $this->restaurant_id);
                })],
            'status' => ['required', 'string'],
            'guest_count' => ['required', 'integer'],
            'restaurant_id' => ['required', 'integer'],
            'location' => ['required', 'string'],
        ];
    }
}
