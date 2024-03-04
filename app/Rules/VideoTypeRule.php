<?php

namespace App\Rules;

use App\Enums\VideoType;
use Illuminate\Contracts\Validation\Rule;

class VideoTypeRule implements Rule
{

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        return in_array($value, VideoType::getValues());
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return 'The :attribute must be a valid video type.';
    }
}
