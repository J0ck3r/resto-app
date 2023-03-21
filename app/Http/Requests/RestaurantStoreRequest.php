<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use App\Models\Restaurant;
use Illuminate\Foundation\Http\FormRequest;

class RestaurantStoreRequest extends FormRequest
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
        $setting = Restaurant::first();

        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string'],
            'user_id' => ['required', 'integer'],
            'image' => ['required', 'image','mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'open_time' => ['required', 'date_format:Y-m-d H:i:s'],
            'close_time' => ['required', 'date_format:Y-m-d H:i:s', function ($attribute, $value, $fail) {
                $open_time = $this->input('open_time');
    
                if (Carbon::parse($value)->lt(Carbon::parse($open_time))) {
                    $fail($attribute . ' must be a time after ' . $open_time . '.');
                }
            }],
        ];
    }
}
