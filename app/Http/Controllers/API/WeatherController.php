<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Weather\WeatherInterface;

use App\Http\Traits\Responser;

use App\Http\Requests\weatherSearchRequest;

class WeatherController extends Controller
{
    use Responser;
    public $weather_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WeatherInterface $weather_service)
    {
        $this->weather_service = $weather_service;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(weatherSearchRequest $request)
    {   
        $validated = $request->validated();
        
        $id = $request->input('id');
        $res = $this->weather_service->searchWeather($id);
        return $this->toJson('Success', $res, 200);
    }
}
