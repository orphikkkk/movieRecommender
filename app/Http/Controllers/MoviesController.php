<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\User;
use App\Models\UserMovie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        $userid = auth()->id();
        $role = auth()->user()->role;

        if ($role == 'admin')
            $movies = Movies::all();
        else{
            $movies = Movies::query()
                ->select(
                    'movies.id as id',
                    'user_movie.id as fav_id',
                    'movies.title as title',
                    'movies.description as description',
                    'movies.release_date as release_date',
                    'movies.poster as poster',
                    'movies.published as published',
                    'movies.likes as likes'
                )
                ->join('user_movie','movies.id','=','user_movie.movie_id')
                ->where('user_movie.user_id','=',$userid)
                ->get();
        }
        return view('Movies.movies')->with(compact('movies'));
    }

    public function create()
    {
        return view('Movies.create');
        //
    }

    public function store(Request $request)
    {

//        dd($request->all());
        $request->validate([
            'title' => 'required|max:255',
            'release_date' => 'exists:company_categories,id'
        ]);

        $newMovie = new Movies;
//        if($request->hasFile('poster')){
//            $request->validate([
//                'poster' =>'image|mimes:jpeg,bmp,png,jpg'
//            ]);
//            $imageName = 'mov_'. $request->get('title') . '.' .$request->file('poster')->extension();
//            $request->file('poster')->move(public_path('images'), $imageName);
//            $newMovie->poster = $imageName;
//        }

        $newMovie->title = $request->get('title');
        $newMovie->description = $request->get('description');
        $newMovie->release_date = $request->get('releaseDate');
        $newMovie->save();

        return redirect(route('movies'));
    }

    public function show(Movies $movies)
    {
        //
    }

    public function edit($id)
    {
        $movies = Movies::query()->whereid($id)->first();

        return view('Movies.edit')->with(compact('movies'));


        //
    }

    public function update(Request $request)
    {
//        dd($request->all());
        $publish = ($request->get('publish') == 'on') ? 1 : 0;
        $movies = Movies::query()->whereid($request->get('id'))->first();
            $movies->title = $request->get('title');
            $movies->description = $request->get('description');
            $movies->release_date = $request->get('releaseDate');
            $movies->published = $publish;
        $movies->save();

        return redirect(route('movies'));
    }
    public function unfavourite($id)
    {
        $favourite = UserMovie::query()->whereid($id)->first();
        $favourite->delete();

        return redirect(route('movies'));
    }

    public function destroy(Movies $movies)
    {
        //
    }
}
