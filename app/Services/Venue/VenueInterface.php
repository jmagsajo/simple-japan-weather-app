<?php

namespace App\Services\Venue;

interface VenueInterface
{
    public function findPlace(string $search);
}