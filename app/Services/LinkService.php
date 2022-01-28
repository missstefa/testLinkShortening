<?php

namespace App\Services;

use Illuminate\Support\Str;

class LinkService
{
    public function linkPostfixGenerate (): string
    {
        return str_shuffle(Str::upper(Str::random(2)).Str::lower(Str::random(2)).mt_rand(10, 99));
    }
}
