<?php

namespace App\Http\Requests\Link;

use Illuminate\Foundation\Http\FormRequest;

class ShortenRequest extends FormRequest
{
    public function rules()
    {
        return [
            'link' => ['required', 'url']
        ];
    }

    public function getLink()
    {
        return $this->get('link');
    }
}
