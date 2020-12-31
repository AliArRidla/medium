<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
        $user = User::findOrFail($user->id);
        return view('profile.index', compact('user'));
    }
}
