<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('department')->get();
        return view('users.index', compact('user'));
    }

    public function show($id)
    {
        $info = User::findOrFail($id);
        return view('users.user-profile', compact('info'));
    }

    public function edit($id)
    {
        $info = User::findOrFail($id);
        return view('users.edit', compact('info'));
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);

        $data->staff_id  = $request->staff_id;
        $data->name      = $request->name;
        $data->gender    = $request->gender;
        $data->address   = $request->address;
        $data->email     = $request->email;
        $data->phonenumber = $request->phonenumber;
        $data->department  = $request->department;
        $data->company_name = $request->company_name;


        $data->save();

        return redirect('/');
    }
}
