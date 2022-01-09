<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Venue\VenueInterface;

use App\Http\Traits\Responser;

use App\Http\Requests\venueSearchRequest;

class VenueController extends Controller
{
    use Responser;
    public $venue_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VenueInterface $venue_service)
    {   
        $this->venue_service = $venue_service;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(venueSearchRequest $request)
    {
        $validated = $request->validated();
        
        $search = $request->input('search');
        
        $res = $this->venue_service->findPlace($search);
        return $this->toJson('Success', $res, 200);
    }
}
