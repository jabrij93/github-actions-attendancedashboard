<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view('users.index', compact('user'));
    }

    public function show($id)
    {
        $info = User::findOrFail($id);
        return view('users.user-profile', compact('info'));
    }
}
