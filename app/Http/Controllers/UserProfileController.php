<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {


        return view("user.profile.index");
    }

    public function update(Request $request)
    {

        $user = Auth::user();
        $request->validate([
            "name" => "required",
            "email" => "email|required|unique:users,email," . $user->id,
            "password" => "nullable|min:8|confirmed"
        ]);



        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password)
        {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route("user.profile")->withToastSuccess('Successfully Updated!');
    }


    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'password' => 'required|min:8',
        ]);
        $user->update([
            $user->password = bcrypt($request->password)
        ]);

        return redirect()->route("user.profile")->withToastSuccess("Password Updated Succefully");
    }
}
