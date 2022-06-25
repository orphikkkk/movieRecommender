<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::whereHas('movies',function ($query) use ($request){
            $query->whereBetween('release_date',[$request->get('from'),$request->get('to')]);
        })->get();

        return view('users')->with(compact('users'));
    }
}
