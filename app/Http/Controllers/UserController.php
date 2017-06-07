<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index')->withUsers($users);
    }

    public function show($id)
    {
        $user = User::find($id);
        switch($user->gender)
        {
            case 0:
                $user->gender = 'Nam';
                break;
            case 1:
                $user->gender = 'Nữ';
                break;
        }
        return view('user.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        switch($user->gender)
        {
            case 0:
                $user->gender = 'Nam';
                break;
            case 1:
                $user->gender = 'Nữ';
                break;
        }
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);

        $users->role = $request->input("role");
        $users->save();

        return redirect()->route('user.show', $users->id);
    }
}
