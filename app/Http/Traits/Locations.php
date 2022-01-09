<?php
namespace App\Http\Traits;

trait Locations {
    
    public function getLonLat(int $id) {
        
        $cities = [
            1 => [
                //tokyo
                "lon" => "139.691711",
                "lat" => "35.689499"
            ],
            2 => [
                //Yokohama
                "lon" => "139.642502",
                "lat" => "35.447781"
            ],
            3 => [
                //Kyoto
                "lon" => "135.753845",
                "lat" => "35.021069"
            ],
            4 => [
                //Osaka
                "lon" => "137.266663",
                "lat" => "35.950001"
            ],
            5 => [
                //Sapporo
                "lon" => "141.346939",
                "lat" => "43.064171"
            ],
            6 => [
                //Nagoya
                "lon" => "136.906403",
                "lat" => "35.181469"
            ]
        ];

        return (object) $cities[$id];

    }

}