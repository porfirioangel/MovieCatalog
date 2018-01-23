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
    public function movieList(Request $request)
    {
        $movies = Movie::all();

        return ResponseUtils::jsonResponse(200, $movies);
    }

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
