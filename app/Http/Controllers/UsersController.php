<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('movies')->get();
        return view('users')->with(compact('users'));
    }
}
