<?php

namespace App\Actions;

class ShortenAction
{
    public const LINK_SHORTENING_SITES = ["http://tinyurl.com/"," http://www.vybor.by/"];

    public static function execute(string $url)
    {
        foreach (self::LINK_SHORTENING_SITES as $key => $linkShorteningSite) {
            if ($key == array_key_last(self::LINK_SHORTENING_SITES) && !CheckSiteAction::checkLive($linkShorteningSite)) {
                throw new \Exception('Sites is unavailable');
            }

            if (!CheckSiteAction::checkLive($linkShorteningSite)) {
                continue;
            }

            return file_get_contents($linkShorteningSite.'api-create.php?url='.$url);
        }
    }
}
