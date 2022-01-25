<?php

namespace App\Http\Actions;

class ShorteningAction
{

    public static function execute($url) {
        return file_get_contents("http://tinyurl.com/api-create.php?url=".$url);
    }
}
