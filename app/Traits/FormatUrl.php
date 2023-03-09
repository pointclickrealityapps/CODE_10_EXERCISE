<?php

namespace App\Traits;

trait FormatUrl
{
    public function formatUrl($url)
    {
        // since we are requesting response to be in Wookiee format,
        // we need to seperate the starShipID from the URL for starships as it appears as jargon.
        $urlArray = explode('/', $url);
        $urlArray = array_filter($urlArray);
        $id = array_pop($urlArray);

        return $id;
    }

}
