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
    public $app_id;

    public function __construct(){
        $this->base_uri = env("WEATHER_BASE_URI");
        $this->app_id = env("WEATHER_APP_ID"); 
    }
    
    public function searchWeather(int $id){
        $client = new Client(["base_uri" => $this->base_uri]);

        $get_location = $this->getLonLat($id);
        
        $payload = [ "query" => 
            [
                "lat" => $get_location->lat,
                "lon" => $get_location->lon,
                "appid" => $this->app_id,
            ]
        ];

        $res = $client->get("onecall", $payload);
        
        $response = $res->getBody();
        return $this->jsonDecoder($response);
    }
}