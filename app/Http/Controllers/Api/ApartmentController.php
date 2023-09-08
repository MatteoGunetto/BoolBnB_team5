<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Amenity;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;
//questo lo aggiungiamo per poter passare l'id dell utente loggato alla create
use Illuminate\Support\Facades\Auth;

//questo lo aggiungiamo per poter usare chiamate API

use Illuminate\Support\Facades\Http;

class ApartmentController extends Controller
{
    public function apartmentsIndex()
    {

        $apartments = Apartment::all();

        return response()->json([
            'apartments' => $apartments
        ]);
    }
    public function apartmentShow($id) {
        $apartment = Apartment:: findOrFail($id);

        return response()->json([
            'apartment' => $apartment
        ]);

    }




}
// class ProjectController extends Controller
// {
//     public function projectsIndex() {
//         $projects = Project::all();

//         return response()->json([
//             'projects' => $projects
//         ]);
//     }

//     public function projectShow($id) {
//         $project = Project :: with("type", "technologies")
//         -> findOrFail($id);

//         return response()->json([
//             'project' => $project
//         ]);

//     }
// }