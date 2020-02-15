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

    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    public function list()
    {
        $users = User::with('profile')->paginate(5);

        return view('user.list', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    public function info($id)
    {
        $user = User::findOrFail($id);

        return view('user.info', compact('user'));
    }
}
