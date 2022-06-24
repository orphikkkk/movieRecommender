<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {

        $movies = Movies::all();

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
            $request->validate([
                'poster' =>'image|mimes:jpeg,bmp,png,jpg'
            ]);
            $imageName = 'mov_'. $request->get('title') . '.' .$request->file('poster')->extension();
            $request->file('poster')->move(public_path('images'), $imageName);
            $newMovie->poster = $imageName;
//        }

        $newMovie->title = $request->get('title');
        $newMovie->description = $request->get('description');
        $newMovie->release_date = $request->get('releaseDate');
        $newMovie->save();

        return view('Movies.movies');
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
        $movies = Movies::query()->whereid($request->get('id'))->first();
            $movies->title = $request->get('title');
            $movies->description = $request->get('description');
            $movies->release_date = $request->get('releaseDate');
        $movies->save();
        return view('Movies.movies');
    }

    public function destroy(Movies $movies)
    {
        //
    }
}
