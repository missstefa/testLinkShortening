<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkStoreRequest extends FormRequest
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
