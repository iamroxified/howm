<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Get all countries
     */
    public function getCountries()
    {
        $countries = Country::orderBy('name')->get(['id', 'name', 'sortname']);
        return response()->json($countries);
    }

    /**
     * Get states for a specific country
     */
    public function getStates(Country $country)
    {
        $states = $country->states()->orderBy('name')->get(['id', 'name']);
        return response()->json($states);
    }
}
