<?php

namespace App\Library;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Http\Traits\Responser;

class VenueService
{
    use Responser;
    public $base_uri = "https://api.foursquare.com/v3/";
    public $headers = [ "Authorization" => "fsq3BOP9lt2VvSCKlOSu1uzFiybqkMiuWdrS/43iqaifj6M="];
    public $ll = "36.2048,138.2529"; //japan

    public function findPlace($search){
        $client = new Client(["base_uri" => $this->base_uri]);

        $payload = [ "query" => 
            [
                "ll" => $this->ll,
                "query" => $search
            ],
            "headers" => $this->headers
        ];

        $res = $client->get("places/search", $payload);
        
        $response = $res->getBody();
        return $this->jsonDecoder($response);
    }
}