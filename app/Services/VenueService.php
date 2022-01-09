<?php

namespace App\Services;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Http\Traits\Responser;

class VenueService
{
    use Responser;
    public $base_uri;
    public $headers;
    public $ll;

    public function __construct(){
        $this->base_uri = env("VENUE_BASE_URI");
        $this->headers = [ "Authorization" => env("VENUE_TOKEN")];
        $this->ll = env("VENUE_LL");
    }

    public function findPlace(string $search){
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