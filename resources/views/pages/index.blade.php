@extends('layouts.weather')

@section('content')

<div id="app">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1>Japan Venues & Weather forecast App</h1>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#weather">Weather</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#venues">Venues</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active show" id="weather">
                        <weather-component></weather-component>
                    </div>
                    <div class="tab-pane fade" id="venues">
                        <venue-component></venue-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>


@endsection