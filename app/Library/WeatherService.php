<?php

namespace App\Library;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Http\Traits\Responser;
use App\Http\Traits\Locations;

class WeatherService
{
    use Responser;
    use Locations;
    public $base_uri = "api.openweathermap.org/data/2.5/";
    public $appid = "eee9345bb041fd34756723aa51f840be";
    
    public function searchWeather($id){
        $client = new Client(["base_uri" => $this->base_uri]);

        $getLocation = $this->getLonLat($id);
        
        $payload = [ "query" => 
            [
                "lat" => $getLocation["lat"],
                "lon" => $getLocation["lon"],
                "appid" => $this->appid,
            ]
        ];

        $res = $client->get("onecall", $payload);
        
        $response = $res->getBody();
        return $this->jsonDecoder($response);
    }
}