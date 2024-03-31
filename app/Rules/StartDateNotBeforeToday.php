<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StartDateNotBeforeToday implements Rule
{
    public function passes($attribute, $value)
    {
        return strtotime($value) >= strtotime(date('Y-m-d'));
    }

    public function message()
    {
        return 'The :attribute must be a date on or after today.';
    }
}
