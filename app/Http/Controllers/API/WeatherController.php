<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Library\WeatherService;

use App\Http\Traits\Responser;

use App\Http\Requests\weatherSearchRequest;

class WeatherController extends Controller
{
    use Responser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        
        $service = new WeatherService();
        $res = $service->searchWeather($id);
        return $this->toJson('Success', $res, 200);
    }
}
