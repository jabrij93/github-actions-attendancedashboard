<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function getdata()
    {
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error";

        $data = User::get();
        $result['data'] = $data;

        $result['status'] = true;
        $result['message'] = "suksess";

        return response()->json($result);
    }

    public function adddata(Request $r)
    {
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error";

        $users = new User;
        $images = null;

        if ($r->hasFile('images')) {
            $file = $r->file('images');
            $name = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/profilephoto_images', $name);
            $images = $name;
        } else {
            $images = $r->images;
        }

        $users->images = $images;
        $users->staff_id = $r->staff_id;
        $users->name = $r->name;
        $users->email = $r->email;
        $users->password = $r->password;
        $users->gender = $r->gender;
        $users->department = $r->department;
        $users->phonenumber = $r->phonenumber;
        $users->company_name = $r->company_name;
        $users->save();

        $result['data'] = $users;
        $result['status'] = true;
        $result['message'] = "suksess add data";

        return response()->json($result);
    }

    public function deleteuser(Request $r)
    {
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error";

        $users = User::find($r->id);
        $users->delete();

        // $result['data'] = $users ;
        $result['status'] = true;
        $result['message'] = "suksess delete data";

        return response()->json($result);
    }

    public function updateuser(Request $r)
    {
        $result = [];
        $result['status'] = false;
        $result['message'] = "something error";

        $users = User::findOrFail($r->id);
        $images = null;

        if ($r->hasFile('images')) {
            $file = $r->file('images');
            $name = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/profilephoto_images', $name);
            $images = $name;
        } else {
            $images = $r->images;
        }

        $users->images = $images;
        $users->staff_id = $r->staff_id;
        $users->name = $r->name;
        $users->email = $r->email;
        $users->password = $r->password;
        $users->gender = $r->gender;
        $users->department = $r->department;
        $users->phonenumber = $r->phonenumber;
        $users->company_name = $r->company_name;
        $users->save();

        $result['data'] = $users;
        $result['status'] = true;
        $result['message'] = "suksess add data";

        return response()->json($result);
    }
}
