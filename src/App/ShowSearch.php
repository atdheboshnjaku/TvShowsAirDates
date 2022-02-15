<?php

declare(strict_types = 1);

namespace Atdhe\Tvshowsapi\App;

class ShowSearch
{

    public function getShowFromAPI(string $searchQuery): array|string 
    {

        $filteredQuery = str_replace(" ", "-", $searchQuery);
        $url = 'https://www.episodate.com/api/show-details?q='
              . urlencode($filteredQuery);

        $response_json = file_get_contents($url);
        $array = json_decode($response_json, true);
        return $array;

    }

}
