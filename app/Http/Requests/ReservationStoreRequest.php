<?php

namespace App\Http\Requests;

use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'guest_count' => ['required', 'integer'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'res_date' => ['required', 'string', 'date', new DateBetween, new TimeBetween],
            'table_id' => ['required', 'integer'],
        ];
    }
}
