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

    public function getUrl() 
    {

    }

}


// if(!empty($_GET['search'])) {

//     $search = $_GET['search'];
//     $clean_search = str_replace(" ", "-", $search);
//     $show_url = 'https://www.episodate.com/api/show-details?q='
//                . urlencode($clean_search);
    
//     $response_json = file_get_contents($show_url);
//     $array = json_decode($response_json, true);
//     $image = $array['tvShow']['image_path'];
//     $showName = $array['tvShow']['name'];
//     $description = $array['tvShow']
//                          ['description'];

//     if(!empty(
//         $array['tvShow']
//         ['countdown']
//         ['air_date']
//         )) {
//         $air_date = $array['tvShow']
//                           ['countdown']
//                           ['air_date'];
//     }

// }