<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function show($userId)
    {
        $user = User::find($userId);

        dd($user);
        return view('user.show', compact('user'));
    }
}
