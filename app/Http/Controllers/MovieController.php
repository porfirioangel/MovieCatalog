<?php

namespace App\Http\Controllers;

use App\Http\ResponseUtils;
use App\Movie;
use Illuminate\Http\Request;
use Mockery\Exception;
use Symfony\Component\HttpFoundation\Exception\RequestExceptionInterface;
use Validator;

class MovieController extends Controller
{
    /**
     * Shows the view with the list of movies
     */
    public function index(Request $request) {
        return view('movie_catalog');
    }

    /**
     * Shows the form to insert a new movie
     */
    public function create(Request $request) {
        return view('insert_movie');
    }

    /**
     * Returns a Json with the list of movies
     */
    public function movieList(Request $request)
    {
        $movies = Movie::all();

        return ResponseUtils::jsonResponse(200, $movies);
    }

    /**
     * Inserts a new movie
     */
    public function insertMovie(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'genre' => 'required',
            'year' => 'required',
        ]);

        if ($validator->passes()) {
            $movie = new Movie();
            $movie->title = $request['title'];
            $movie->genre = $request['genre'];
            $movie->year = $request['year'];

            try {
                $movie->save();
                return ResponseUtils::jsonResponse(200, $movie);
            } catch (Exception $e) {
                return ResponseUtils::jsonResponse(400, [
                    'error' => '---'
                ]);
            }
        }

        return ResponseUtils::jsonResponse(400, [
            'error' => $validator->errors()->all()
        ]);
    }
}
