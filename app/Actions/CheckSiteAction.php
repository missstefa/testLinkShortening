<?php

namespace App\Actions;

class CheckSiteAction
{
    public static function checkLive($url): bool
    {
        $curlInit = curl_init($url);

        curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
        curl_setopt($curlInit,CURLOPT_HEADER,true);
        curl_setopt($curlInit,CURLOPT_NOBODY,true);
        curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

        //get answer
        $response = curl_exec($curlInit);

        curl_close($curlInit);

        return (bool) $response;
    }
}
