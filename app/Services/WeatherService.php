<?php

namespace App\Services;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Http\Traits\Responser;
use App\Http\Traits\Locations;

class WeatherService
{
    use Responser;
    use Locations;
    public $base_uri;
    public $appid;

    public function __construct(){
        $this->base_uri = env("WEATHER_BASE_URI");
        $this->appid = env("WEATHER_APP_ID"); 
    }
    
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