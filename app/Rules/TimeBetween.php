<?php

namespace App\Rules;

use Carbon\Carbon;
use App\Models\Restaurant;
use Illuminate\Contracts\Validation\Rule;

class TimeBetween implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pickupDate = Carbon::parse($value);
        $pickupTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);
        // when the restaurant is open
        $restaurant = Restaurant::first(); // assuming there's only one restaurant
        $earliestTime  = Carbon::createFromTimeString($restaurant->open_time);
        $lastTime  = Carbon::createFromTimeString($restaurant->close_time);

        return $pickupTime->between($earliestTime, $lastTime) ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $restaurant = Restaurant::first(); // assuming there's only one restaurant
        return __('The :attribute must be between :open_time and :close_time.', [
        'open_time' => $restaurant->open_time,
        'close_time' => $restaurant->close_time,
    ]);
    }
}
