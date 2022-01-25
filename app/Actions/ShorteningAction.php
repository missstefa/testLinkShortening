<?php

namespace App\Actions;

class ShorteningAction
{
    public const LINK_SHORTENING_SITES = ["http://www.vybor.by/"];

    public static function execute(string $url)
    {
        foreach (self::LINK_SHORTENING_SITES as $key => $linkShorteningSite) {

            if ($key == array_key_last(self::LINK_SHORTENING_SITES) && !CheckSiteAction::checkLive($linkShorteningSite)) {
                return back()->withError('Site is unavailable');
            }

            if (!CheckSiteAction::checkLive($linkShorteningSite)) {
                continue;
            }

            try {
                return file_get_contents($linkShorteningSite.'api-create.php?url='.$url);
            } catch (\Exception $exception) {
                return back()->withError($exception->getMessage());
            }
        }
    }
}
