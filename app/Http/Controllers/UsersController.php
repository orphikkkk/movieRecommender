<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env\Request;

class UsersController extends Controller
{
    public function index($from,$to)
    {
//        dd($request);
        $users = User::with('movies')->get();
        return view('users')->with(compact('users'));
    }
}
