<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Amenity;

class AmenityApiController extends Controller
{
    public function amenitiesIndex()
    {
        $amenities = Amenity::all();
    
        return $amenities
    ;
    }
}
