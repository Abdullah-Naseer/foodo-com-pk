<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RequiredIfExists implements Rule
{
    protected $field;

    public function __construct($field)
    {
        $this->field = $field;
    }

    public function passes($attribute, $value)
    {
        return !request()->has($this->field) || !empty($value);
    }

    public function message()
    {
        return 'The :attribute field is required.';
    }
}
