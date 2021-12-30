<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Library\VenueService;

use App\Http\Traits\Responser;

use App\Http\Requests\venueSearchRequest;

class VenueController extends Controller
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
    public function index(venueSearchRequest $request)
    {
        $validated = $request->validated();
        
        $search = $request->input('search');
        $test = new VenueService();
        $res = $test->findPlace($search);
        return $this->toJson('Success', $res, 200);
    }
}
