<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('department')->get();
        return view('users.index', compact('user'));
    }

    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $data = new User;

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $name = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/profilephoto_images', $name);
            $images = $name;
        } else {
            $images = $request->images;
        }

        $data->images = $images;
        $data->staff_id  = $request->staff_id;
        $data->name      = $request->name;
        $data->email     = $request->email;
        $data->password = bcrypt($request->get('password'));
        $data->gender    = $request->gender;
        $data->address   = $request->address;
        $data->phonenumber = $request->phonenumber;
        $data->department  = $request->department;

        $data->save();

        return redirect('/');
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

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $name = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/profilephoto_images', $name);
            $images = $name;
        } else {
            $images = $request->images;
        }

        $data->images = $images;
        $data->staff_id  = $request->staff_id;
        $data->name      = $request->name;
        $data->email     = $request->email;
        $data->password = bcrypt($request->get('password'));
        $data->gender    = $request->gender;
        $data->address   = $request->address;
        $data->phonenumber = $request->phonenumber;
        $data->department  = $request->department;

        $data->save();

        return redirect('/');
    }
}
