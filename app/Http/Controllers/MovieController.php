<?php

namespace App\Http\Controllers;

use App\Http\ResponseUtils;
use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function movieList(Request $request)
    {
        $movies = Movie::all();

        return ResponseUtils::jsonResponse(200, $movies);
    }
}
